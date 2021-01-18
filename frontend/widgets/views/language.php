<?php

/**
 * @var $this View
 * @var $list array
 */

use yii\web\View;

?>
<?php if ($list) : ?>
    <div class="sidenav__language">
        <ul>
            <?php foreach ($list as $list_item) : ?>
                <?php if ($list_item['selected']) : ?>
                    <li>
                        <span><?= $list_item['label'] ?></span>
                    </li>
                <?php else : ?>
                    <li>
                        <a href="<?= $list_item['url'] ?>"><?= $list_item['label'] ?></a>
                    </li>
                <?php endif ?>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>
