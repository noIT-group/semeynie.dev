<?php

/**
 * @var $this View
 */

use frontend\widgets\MainSectionWidget;
use frontend\widgets\SubscribeFormWidget;
use yii\web\View;

$latitude = Yii::$app->settings->get('MapSectionSettings.latitude');
$longitude = Yii::$app->settings->get('MapSectionSettings.longitude');
$zoom = Yii::$app->settings->get('MapSectionSettings.zoom');

?>
<?= MainSectionWidget::widget(['view' => 'location']) ?>
<main>
    <section class="main_locations" id="location_anchor">
        <div class="boxes">
            <div class="map item move_on_scroll" data-move-acselerat="20">
                <div class="map_wrap">
                    <div id="map"></div>
                    <script>
                        var map;
                        var myLatLng = {lat: <?= $latitude ?>, lng: <?= $longitude ?>};
                        var pointsSize = [90,128];

                        if(window.innerWidth <= 1400){
                            pointsSize = [45,64];
                        }

                        function initMap() {
                            map = new google.maps.Map(document.getElementById('map'), {
                                center: myLatLng,
                                zoom: <?= $zoom ?>
                            });

                            var image = 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzNzAuOSA1MTIiIHdpZHRoPSI5MCIgaGVpZ2h0PSIxMjgiPjxwYXRoIGQ9Ik0xODUuNCAwQzgzLjIgMCAwIDgzLjIgMCAxODUuNGMwIDEyNi45IDE2NS45IDMxMy4yIDE3MyAzMjEgNi42IDcuNCAxOC4yIDcuNCAyNC44IDAgNy4xLTcuOSAxNzMtMTk0LjEgMTczLTMyMUMzNzAuOSA4My4yIDI4Ny43IDAgMTg1LjQgMG0wIDI3OC43Yy01MS40IDAtOTMuMy00MS45LTkzLjMtOTMuM3M0MS45LTkzLjMgOTMuMy05My4zIDkzLjMgNDEuOSA5My4zIDkzLjMtNDEuOCA5My4zLTkzLjMgOTMuMyIgZmlsbD0iIzAwM2M1OCIvPjwvc3ZnPg==';

                            var icon = {
                                url: image,
                                scaledSize: new google.maps.Size(pointsSize[0], pointsSize[1]), // scaled size
                                origin: new google.maps.Point(0,0), // origin
                                anchor: new google.maps.Point(pointsSize[0]/2, pointsSize[1]) // anchor
                            };

                            var marker = new google.maps.Marker({
                                position: myLatLng,
                                map: map,
                                icon: icon
                            });

                        }
                    </script>
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYDd4iEElkufHl0QiOaAFoz2_JyNt2n3A&amp;callback=initMap" async defer></script>
                </div>
            </div>
            <div class="canals_block item move_on_scroll" data-move-acselerat="35">
                <div class="cont_height">
                    <div class="cont">
                        <div class="head"><?= Yii::t('app', 'connect_to_our_community__label') ?></div>
                        <?= SubscribeFormWidget::widget(['view' => 'subscribe-form']) ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>