<?php

/**
 * @var $this View
 * @var $socialGroupSettings array
 */

use yii\web\View;

?>
<?php if ($socialGroupSettings) : ?>
    <div class="footer__social">
        <?php foreach ($socialGroupSettings as $socialGroupSetting) : ?>
            <a href="<?= $socialGroupSetting['link_url'] ?>" target="_blank" class="footer__social-link"><i
                        class="icon icon-<?= $socialGroupSetting['link_type'] ?>"></i></a>
        <?php endforeach ?>
    </div>
<?php endif ?>