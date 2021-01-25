<?php

/**
 * @var $this View
 * @var $list array
 */

use yii\web\View;

?>
<?php if ($list) : ?>
    <div class="lang">
        <?php foreach ($list as $list_item) : ?>
            <?php if ($list_item['selected']) : ?>
                <span class="lang__link active"><?= $list_item['label'] ?></span>
            <?php else : ?>
                <a href="<?= $list_item['url'] ?>" class="lang__link"><?= $list_item['label'] ?></a>
            <?php endif ?>
        <?php endforeach ?>
    </div>
<?php endif ?>
