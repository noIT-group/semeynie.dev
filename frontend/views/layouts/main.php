<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);

$_jsThefloorsBtn = <<<JS
setTimeout(function() {
  $("#widget-btn").hide();
}, 800);
$(window).scroll(function () {
    if ((window.scrollY || window.pageYOffset) > $('.menu_btn_wrp').offset().top - 20) {
        $("#widget-btn").show();
    } else {
        $("#widget-btn").hide();
    }
});
JS;

$this->registerJs($_jsThefloorsBtn);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title><?= Html::encode($this->title) ?></title>
    <?= $this->render('_components/_favicon') ?>
    <?= $this->render('_components/_open-graph-protocol') ?>
    <?= $this->render('_components/analytics/gtm') ?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?= $this->render('_components/analytics/gtm-no-script') ?>

<?= $this->render('@frontend/views/layouts/_header') ?>

<div class="wrap_all">
    <?= $content ?>
    <?= $this->render('@frontend/views/layouts/_footer') ?>
</div>

<?= $this->render('@frontend/views/layouts/_components/modal-windows/blueimp') ?>
<?= $this->render('@frontend/views/layouts/_components/modal-windows/popup') ?>
<?= $this->render('@frontend/views/layouts/_components/modal-windows/ads') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
