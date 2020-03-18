<?php
namespace common\modules\languages\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;

class LanguageWidget extends Widget
{
    public $view_type;

    private $current_language;
    private $languages;

    public function init()
    {
        $this->current_language = Yii::$app->language;
        $this->languages = Yii::$app->getModule('languages')->languages;
    }

    /**
     * @return string
     */
    public function run()
    {
        if(!$this->view_type) {
            throw new NotFoundHttpException();
        }

        $another_language = null;

        foreach ($this->languages as $key => $value) {

            if($this->languages[$this->current_language] != $value) {

                if($this->view_type === 'desktop') {
                    $label = ($value === 'ru') ? 'По-русски' : 'Українською';
                    $label_mobile = ($value === 'ru') ? 'РУС' : 'УКР';

                    $another_language = Html::a($label, ['languages/default/index', 'lang' => $value],[
                        'class' => 'desktop',
                    ]);

                    $another_language .= Html::a($label_mobile, ['languages/default/index', 'lang' => $value], [
                        'class' => 'mobile-language',
                    ]);

                } elseif($this->view_type === 'mobile') {
                    $label = ($value === 'ru') ? 'РУС' : 'УКР';

                    $another_language = Html::a($label, ['languages/default/index', 'lang' => $value]);

                }  else {
                    return;
                }

            }

        }

        return $this->render('list',[
            'language' => $another_language,
        ]);
    }
}