<?php

/* @var $this \yii\web\View */

/* @var $content string */

use frontend\widgets\FooterWidget;
use frontend\widgets\HeaderWidget;
use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\widgets\Spaceless;

AppAsset::register($this);

?>
<?php (YII_ENV_PROD) ? Spaceless::begin() : null ?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title><?= Html::encode($this->title) ?></title>
    <?= $this->render('_components/_favicon') ?>
    <?= $this->render('_components/_open-graph-protocol') ?>
    <?= $this->render('_components/analytics/gtm') ?>
    <?php $this->head() ?>
</head>
<body class="<?= isset(Yii::$app->view->params['body__class']) ? Yii::$app->view->params['body__class'] : null ?>">
<?php $this->beginBody() ?>

<?= $this->render('_components/analytics/gtm-no-script') ?>

<?= HeaderWidget::widget() ?>
<main class="main">
    <?= $content ?>
</main>
<?= FooterWidget::widget() ?>

<?= $this->render('@frontend/views/layouts/_components/modal-windows') ?>

<script>
    function initMap() {

        if (document.getElementById('contact-map') !== null) {

            var map = new google.maps.Map(document.getElementById('contact-map'), {
                zoom: 16,
                center: {
                    lat: 46.482781,
                    lng: 30.693278
                },
                disableDefaultUI: true,
            });

        }

    }
</script>

<?= $this->registerJsFile('https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js') ?>

<?= $this->registerJsFile('https://maps.googleapis.com/maps/api/js?key=AIzaSyAtdJ2lMzLN7jGl_KHHWv1UvXrhqExiSUM&callback=initMap') ?>

<?php $this->endBody() ?>
<?php $this->endPage() ?>
<?php (YII_ENV_PROD) ? Spaceless::end() : null ?>
