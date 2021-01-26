<?php

/**
 * @var $this View
 * @var $socialGroupSettings array
 */

use yii\web\View;

?>
<?php if ($socialGroupSettings) : ?>
    <div class="hero-menu">
        <?php foreach ($socialGroupSettings as $socialGroupSetting) : ?>
            <a href="<?= $socialGroupSetting['link_url'] ?>" target="_blank" class="hero-menu__link"><i
                        class="icon icon-<?= $socialGroupSetting['link_type'] ?>"></i></a>
        <?php endforeach ?>
    </div>
<?php endif ?>
