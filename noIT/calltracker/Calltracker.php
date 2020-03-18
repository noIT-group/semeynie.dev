<?php
namespace noIT\calltracker;

use yii\base\Component;
use yii\base\Exception;

class Calltracker extends Component {
    /**
     * @var $allItems array
     */
    public $types;

    public $limit;

    public $items;

    public $sourcesFiled = 'source';

    public $rulesNamespace = "noIT\\calltracker\\rules";

    protected $_allItems;

    public function init()
    {
        parent::init();

        if (!is_array($this->types)) {
            throw new Exception("Types can't empty");
        }

        if (null === $this->limit) {
            $this->limit = 1e3;
        }

        if (is_callable($this->items)) {
            $functName = $this->items;
            $this->items = $functName();
        }

        $types = [];
        foreach ($this->types as $key => $label) {
            if (is_numeric($key)) {
                $key = $label;
                $label = ucfirst($label);
            }
            $types[$key] = $label;
        }
        $this->types = $types;
    }

    public function getAllItems() {
        if (null === $this->_allItems) {
            $this->_allItems = [];

            foreach ($this->items as $item) {
                $_item = is_object($item) ? (array)$item : $item;

                $sources = isset($_item[$this->sourcesFiled]) ? $_item[$this->sourcesFiled] : '*';

                if (!is_array($sources)) {
                    $sources = [$sources];
                }

                foreach ($sources as $source) {
                    if ($source == '*' || (($source = $this->getRule($source)) && $source->run())) {
                        $this->_allItems[] = $item;
                        break;
                    }
                }
            }
        }

        return $this->_allItems;
    }

    public function getItems($limit = null) {


        if (null === $limit) {
            $limit = $this->limit;
        }

        return array_slice($this->allItems, 0, $limit);
    }

    protected function getRule($source) {
        $ruleClass = $this->rulesNamespace ."\\". ucfirst($source);

        if (!class_exists($ruleClass)) {
            return;
        }

        return new $ruleClass();
    }
}