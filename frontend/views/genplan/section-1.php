<?php

/**
 * @var $this View
 * @var $section_number string
 */

use frontend\widgets\SocialNetworkWidget;
use yii\web\View;

$this->title = Yii::t('app', 'section_txt') . " № {$section_number}";

?>
<!-- DESKTOP -->
<section class="hero fix">
    <div class="hero__inner">
        <div class="hero-menu">
            <a href="#" class="hero-menu__link"><i class="icon icon-facebook"></i></a>
            <a href="#" class="hero-menu__link"><i class="icon icon-insta"></i></a>
            <a href="#" class="hero-menu__link"><i class="icon icon-youtube"></i></a>
        </div>
        <div class="section__wrap">
            <span class="title">Выбрать квартиру</span>

            <div class="section__inner">
                <img src="/img/section1.png" alt="" class="section__img">
                <svg xmlns="http://www.w3.org/2000/svg" width="1715" height="925" viewBox="0 0 1715 925"
                     class="section__svg">
                    <a href="#plan" class="section__svg-item">
                        <path data-level="1 ЭТАЖ" data-desc="11 в продаже" class="section__path floors__element"
                              d="M275,869.533L391.735,879l12.337-8.52,26.574,5.68,37.341-12.239,17.7,1.825,77.823-33.134,19.93,1.893L629,818.411l-0.949-42.6-38.912,13.253-28.471-1.893-75.925,27.454-18.925-1.2-32.325,11.614-29.421-4.733-12.337,5.68-99.788-4.047-1.762-3.527L275,816.518v53.015Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path data-level="2 ЭТАЖ" data-desc="11 в продаже" class="section__path floors__element"
                              d="M275.949,816.518l15.185,1.893,2.284,3.412,98.317,3.215,11.388-5.68,28.472,4.733,36.065-10.413h18.032l74.976-26.508,27.522,0.947,40.81-14.2L627.1,735.1l-41.759,11.36H572.056l-87.313,23.667-18.925-1.2L435.391,777.7l-30.37-1.893-13.286,2.84-96.8-4.734v-5.68H275.949v48.282Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path data-level="3 ЭТАЖ" data-desc="11 в продаже" class="section__path floors__element"
                              d="M276.9,768.236l18.032-.947,0.949,5.681,94.907,6.626,13.286-4.733,27.523,1.893,34.166-8.52,18.982,1.893,88.262-23.667h13.287L627.1,735.1l-1.9-32.188-41.759,12.307h-9.491l-89.211,17.987-18.982-.947-30.37,7.574-30.37-.947-13.286,1.894-94.557-3.866-0.35-5.6-19.93.946v35.975Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path data-level="4 ЭТАЖ" data-desc="11 в продаже" class="section__path floors__element"
                              d="M277.847,731.315h18.032l0.949,4.733,94.907,4.734,12.337-2.84,27.523,1.893,36.065-7.574h18.032L574.9,714.274l10.44-.947,40.81-11.36L625.2,671.673l-40.81,7.573-10.44,1.894-89.211,12.307-18.982-.947-33.217,5.68-30.37-.946-11.388,1.893-93.55-3.856-0.408.069-18.981-.947v36.922Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path data-level="5 ЭТАЖ" data-desc="11 в продаже" class="section__path floors__element"
                              d="M276.9,692.5l19.93,0.947v0.946l95.856,4.734,12.337-2.84,27.523,1.893,36.065-7.573,16.134,2.84,89.211-13.254,10.44-.947,41.759-8.52L625.2,640.431l-41.759,4.734-10.44-.947-87.313,7.574-18.982-.947-32.268,2.84H403.123l-12.337.947-94.5-1.571-0.407-3.163-18.032.947Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path data-level="6 ЭТАЖ" data-desc="11 в продаже" class="section__path floors__element"
                              d="M276.9,650.845h18.981v1.894l96.805,1.893,12.337-1.893,28.472,0.946,34.167-4.733,17.083,2.84,89.211-7.574,10.44-.946,41.759-3.787L625.2,609.19l-42.708-.946-10.44-.947-86.364,4.733-18.982-.946-32.268.946H403.123l-12.337.947-94.034-1.563,1.025-2.224H276.9v41.655Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path data-level="7 ЭТАЖ" data-desc="11 в продаже" class="section__path floors__element"
                              d="M275.949,609.19h19.93l0.949,0.947,95.856,2.84,12.337-1.893,28.472,0.946h51.25l89.211-4.733,8.542,0.947L625.2,609.19V575.109L582.5,571.322l-10.44-.946H485.692l-18.982-.947-32.268.947H403.123l-11.388-1.894H296.757l-0.878-.946H277.847Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path data-level="8 ЭТАЖ" data-desc="11 в продаже" class="section__path floors__element"
                              d="M277.847,566.589l19.93,0.947h-0.949l95.856,0.946,12.337,0.947H574.9l8.542,0.947,41.759,4.733V541.028l-40.81-4.734-10.44-.946-88.262-7.574-18.982-.947-32.268.947H403.123l-11.388-1.893H296.283l0.545,6.627-18.981-.947v35.028Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path data-level="9 ЭТАЖ" data-desc="11 в продаже" class="section__path floors__element"
                              d="M277.847,530.614h18.981l-0.949-4.733h96.805l12.337,0.946h79.722L574.9,534.4l8.542,0.947,41.759,4.733V506l-40.81-4.734-10.44-.946-88.262-12.307H467.66l-33.218-2.84H403.123l-11.388-1.894H296.757l1.02,5.68h-19.93v41.655Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path data-level="10 ЭТАЖ" data-desc="11 в продаже" class="section__path floors__element"
                              d="M276.9,488.013h19.93v-5.681l95.856,0.947,12.337,0.947h28.472l33.217,2.84h18.033l89.211,12.307,8.542,0.947L626.153,506l0.949-31.241-42.708-10.414-10.44-.947-88.262-16.093H467.66l-34.167-6.627H296.757l0.071,6.627-19.93-.947v41.655Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path data-level="11 ЭТАЖ" data-desc="11 в продаже" class="section__path floors__element"
                              d="M277.847,445.411l18.981,0.947v-5.68h95.856l12.337-.947,29.421,0.947,32.268,6.627h18.033l88.262,15.147,8.542,0.946,44.606,10.414,0.949-30.294-43.657-13.254-10.44-.947L485.692,404.7H467.66l-34.167-6.627-27.522-1.893-14.236-.947-94.007,2.325,0.049,6.195h-19.93v41.655Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path data-level="12 ЭТАЖ" data-desc="11 в продаже" class="section__path floors__element"
                              d="M277.847,403.756h19.93v-6.627l94.907-1.893,12.337,0.947,29.421,1.893L466.71,404.7h18.033l88.262,23.668,8.542,0.946L627.1,442.571l-0.949-33.134-42.708-15.148-10.44-.946L485.692,362.1H467.66l-34.167-6.627-27.522-1.894-14.236-.946-94.979,2.348L296.828,364H277.847v39.761Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path data-level="13 ЭТАЖ" data-desc="11 в продаже" class="section__path floors__element"
                              d="M277.847,363.048h18.981v-7.573l96.805-2.84,12.338,0.946,29.42,1.894,32.269,5.68h18.032L573.954,392.4l8.542,0.947L625.2,409.437,624.255,376.3l-38.912-17.987-10.44-.947L487.59,323.287H469.558l-35.116-10.414L406.92,310.98l-14.236-.947-94.03,2.326-0.877,5.248-19.93,1.893v43.548Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path data-level="14 ЭТАЖ" data-desc="11 в продаже" class="section__path floors__element"
                              d="M277.847,318.553l19.93-.946v-4.734l95.856-2.84,12.338,0.947,29.42,1.893,32.269,10.414h18.032l88.262,33.134,8.542,0.947,43.657,19.881L625.2,344.114l-39.861-20.827-10.44-.947L487.59,282.579H469.558l-35.116-12.307-27.522-1.894-14.236-.947-95.418,2.36,0.511,4.267-19.93,1.894v42.6Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path data-level="15 ЭТАЖ" data-desc="11 в продаже" class="section__path floors__element"
                              d="M277.847,275.952l19.93-1.894v-3.786l95.856-3.787,12.338,0.946,29.42,1.894,33.218,12.307h18.032L574.9,322.34l8.542,0.947,42.708,19.881L625.2,310.033l-40.81-22.721-10.44-.947-87.313-44.494H468.609l-34.167-15.148L406.92,224.83l-14.236-.947-95.453,2.361,0.546,9-18.981.946Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path data-level="16 ЭТАЖ" data-desc="11 в продаже" class="section__path floors__element"
                              d="M278.8,236.19l18.032-.946v-8.521l96.805-2.84,12.338,0.947,29.42,1.893,33.218,15.148h18.032l87.313,44.494,10.44-.946,41.759,24.614V274.058l-42.708-24.614-10.44-.947L487.59,201.162H469.558L436.34,183.175l-30.369,1.894-13.287-3.787-99.72,1.644,0.068,6.876-14.236.947V236.19Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path data-level="17 ЭТАЖ" data-desc="11 в продаже" class="section__path floors__element"
                              d="M277.847,190.749l15.185-.947-0.555-6.039,101.156-2.481,10.439,2.84h31.319l34.167,15.147,17.083,1.893L573.954,248.5l11.389,0.947,40.81,24.614v-42.6l-42.708-24.614-10.44-.947L487.59,158.561H469.558L436.34,140.574l-29.42.946L397.429,133l-103.968,6.585,0.52,11.4-16.134,1.894v37.868Z"></path>
                    </a>
                    <image xlink:href="../img/pin-section.png" clip-path="url(#clip-ff)" width="118" height="149"
                           x="400" y="25" class="section__pin"></image>
                </svg>
                <div class="floors__popup">
                    <span class="floors__level">11 этаж</span>
                    <span class="floors__desc">0 в продаже</span>
                </div>
                <a href="#graphic" class="params btn btn_beige-dark info-modal__btn section__btn">Подбор по
                    параметрам</a>

            </div>

        </div>
    </div>
</section>
<!-- DESKTOP -->

<!-- MOBILE -->
<section class="section_mob">
    <div class="plan_mob__menu">
        <a href="#" class="plan_mob__menu-link"><img src="/img/burger.svg" alt=""><span>Список</span></a>
        <a href="plan-mob.html" class="plan_mob__menu-link dark"><img src="/img/sheme-icon.svg"
                                                                      alt=""><span>Карточки</span></a>
    </div>
    <div class="plan_mob__subtitle">
        <span>Найдено квартир: <strong>25</strong></span>
    </div>
    <div class="plan_mob__filter-wrap">
        <a href="#filter_mod" class="plan_mob__filter-link refine"><span class="icon">+</span> уточнить фильтры</a>
        <div class="plan_mob__filter-link reset"><span class="icon">+</span> сбросить фильтры</div>
    </div>
    <div class="graphic__table">
        <div class="graphic__table-header">
            <div class="graphic__table-item">Секция</div>
            <div class="graphic__table-item">Этаж</div>
            <div class="graphic__table-item">Квартира №</div>
            <div class="graphic__table-item">Комнаты</div>
            <div class="graphic__table-item">Площадь</div>
            <div class="graphic__table-item status">Статус</div>
        </div>
        <div class="graphic__table-body" data-mcs-theme="dark">
            <a href="flat.html" class="graphic__table-row">
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">3</div>
                <div class="graphic__table-item">4</div>
                <div class="graphic__table-item">1</div>
                <div class="graphic__table-item">46.3</div>
                <div class="graphic__table-item status">в продаже</div>
                <div class="graphic__table-img">
                    <div class="graphic__table-img-inner"><img src="/img/flat-graf.png" alt=""></div>
                </div>
            </a>
            <a href="flat.html" class="graphic__table-row">
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">5</div>
                <div class="graphic__table-item">1</div>
                <div class="graphic__table-item">45.4</div>
                <div class="graphic__table-item status">в продаже</div>
                <div class="graphic__table-img">
                    <div class="graphic__table-img-inner"><img src="/img/flat-10.jpg" alt=""></div>
                </div>
            </a>
            <a href="flat.html" class="graphic__table-row">
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">3</div>
                <div class="graphic__table-item">17</div>
                <div class="graphic__table-item">1</div>
                <div class="graphic__table-item">45.8</div>
                <div class="graphic__table-item status">в продаже</div>
                <div class="graphic__table-img">
                    <div class="graphic__table-img-inner"><img src="/img/flat-3.jpg" alt=""></div>
                </div>
            </a>
            <a href="flat.html" class="graphic__table-row">
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">3</div>
                <div class="graphic__table-item">20</div>
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">66.0</div>
                <div class="graphic__table-item status">в продаже</div>
                <div class="graphic__table-img">
                    <div class="graphic__table-img-inner"><img src="/img/flat-6.jpg" alt=""></div>
                </div>
            </a>
            <a href="flat.html" class="graphic__table-row">
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">118</div>
                <div class="graphic__table-item">230</div>
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">63.5</div>
                <div class="graphic__table-item status">в продаже</div>
                <div class="graphic__table-img">
                    <div class="graphic__table-img-inner"><img src="/img/flat-6.jpg" alt=""></div>
                </div>
            </a>
            <a href="flat.html" class="graphic__table-row">
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">5</div>
                <div class="graphic__table-item">49</div>
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">63.9</div>
                <div class="graphic__table-item status">в продаже</div>
                <div class="graphic__table-img">
                    <div class="graphic__table-img-inner"><img src="/img/flat-graf.png" alt=""></div>
                </div>
            </a>
            <a href="flat.html" class="graphic__table-row">
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">20</div>
                <div class="graphic__table-item">256</div>
                <div class="graphic__table-item">1</div>
                <div class="graphic__table-item">44.9</div>
                <div class="graphic__table-item status">в продаже</div>
                <div class="graphic__table-img">
                    <div class="graphic__table-img-inner"><img src="/img/flat-graf.png" alt=""></div>
                </div>
            </a>
            <a href="flat.html" class="graphic__table-row">
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">4</div>
                <div class="graphic__table-item">37</div>
                <div class="graphic__table-item">3</div>
                <div class="graphic__table-item">90.3</div>
                <div class="graphic__table-item status">в продаже</div>
                <div class="graphic__table-img">
                    <div class="graphic__table-img-inner"><img src="/img/flat-10.jpg" alt=""></div>
                </div>
            </a>
            <a href="flat.html" class="graphic__table-row">
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">5</div>
                <div class="graphic__table-item">53</div>
                <div class="graphic__table-item">1</div>
                <div class="graphic__table-item">48.2</div>
                <div class="graphic__table-item status">в продаже</div>
                <div class="graphic__table-img">
                    <div class="graphic__table-img-inner"><img src="/img/flat-3.jpg" alt=""></div>
                </div>
            </a>
            <a href="flat.html" class="graphic__table-row">
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">4</div>
                <div class="graphic__table-item">39</div>
                <div class="graphic__table-item">1</div>
                <div class="graphic__table-item">48.2</div>
                <div class="graphic__table-item status">в продаже</div>
                <div class="graphic__table-img">
                    <div class="graphic__table-img-inner"><img src="/img/flat-4.jpg" alt=""></div>
                </div>
            </a>
            <a href="flat.html" class="graphic__table-row">
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">18</div>
                <div class="graphic__table-item">230</div>
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">63.5</div>
                <div class="graphic__table-item status">в продаже</div>
                <div class="graphic__table-img">
                    <div class="graphic__table-img-inner"><img src="/img/flat-graf.png" alt=""></div>
                </div>
            </a>
            <a href="flat.html" class="graphic__table-row">
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">4</div>
                <div class="graphic__table-item">37</div>
                <div class="graphic__table-item">3</div>
                <div class="graphic__table-item">90.3</div>
                <div class="graphic__table-item status">в продаже</div>
                <div class="graphic__table-img">
                    <div class="graphic__table-img-inner"><img src="/img/flat-12.png" alt=""></div>
                </div>
            </a>
            <a href="flat.html" class="graphic__table-row">
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">5</div>
                <div class="graphic__table-item">53</div>
                <div class="graphic__table-item">1</div>
                <div class="graphic__table-item">48.2</div>
                <div class="graphic__table-item status">в продаже</div>
                <div class="graphic__table-img">
                    <div class="graphic__table-img-inner"><img src="/img/flat-4.jpg" alt=""></div>
                </div>
            </a>
            <a href="flat.html" class="graphic__table-row">
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">4</div>
                <div class="graphic__table-item">39</div>
                <div class="graphic__table-item">1</div>
                <div class="graphic__table-item">48.2</div>
                <div class="graphic__table-item status">в продаже</div>
                <div class="graphic__table-img">
                    <div class="graphic__table-img-inner"><img src="/img/flat-graf.png" alt=""></div>
                </div>
            </a>
            <a href="flat.html" class="graphic__table-row">
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">18</div>
                <div class="graphic__table-item">230</div>
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">63.5</div>
                <div class="graphic__table-item status">в продаже</div>
                <div class="graphic__table-img">
                    <div class="graphic__table-img-inner"><img src="/img/flat-12.png" alt=""></div>
                </div>
            </a>
            <a href="flat.html" class="graphic__table-row">
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">18</div>
                <div class="graphic__table-item">230</div>
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">63.5</div>
                <div class="graphic__table-item status">в продаже</div>
                <div class="graphic__table-img">
                    <div class="graphic__table-img-inner"><img src="/img/flat-10.jpg" alt=""></div>
                </div>
            </a>
            <a href="flat.html" class="graphic__table-row">
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">4</div>
                <div class="graphic__table-item">39</div>
                <div class="graphic__table-item">1</div>
                <div class="graphic__table-item">48.2</div>
                <div class="graphic__table-item status">в продаже</div>
                <div class="graphic__table-img">
                    <div class="graphic__table-img-inner"><img src="/img/flat-graf.png" alt=""></div>
                </div>
            </a>
            <a href="flat.html" class="graphic__table-row">
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">4</div>
                <div class="graphic__table-item">39</div>
                <div class="graphic__table-item">1</div>
                <div class="graphic__table-item">48.2</div>
                <div class="graphic__table-item status">в продаже</div>
                <div class="graphic__table-img">
                    <div class="graphic__table-img-inner"><img src="/img/flat-graf.png" alt=""></div>
                </div>
            </a>
            <a href="flat.html" class="graphic__table-row sold-flat">
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">18</div>
                <div class="graphic__table-item">230</div>
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">63.5</div>
                <div class="graphic__table-item status">продана</div>
                <!--                            <div class="graphic__table-img"><div class="graphic__table-img-inner"><img src="/img/flat-12.png" alt=""></div></div>-->
            </a>
            <a href="flat.html" class="graphic__table-row">
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">18</div>
                <div class="graphic__table-item">230</div>
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">63.5</div>
                <div class="graphic__table-item status">в продаже</div>
                <div class="graphic__table-img">
                    <div class="graphic__table-img-inner"><img src="/img/flat-10.jpg" alt=""></div>
                </div>
            </a>
            <a href="flat.html" class="graphic__table-row">
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">4</div>
                <div class="graphic__table-item">39</div>
                <div class="graphic__table-item">1</div>
                <div class="graphic__table-item">48.2</div>
                <div class="graphic__table-item status">в продаже</div>
                <div class="graphic__table-img">
                    <div class="graphic__table-img-inner"><img src="/img/flat-graf.png" alt=""></div>
                </div>
            </a>
            <a href="flat.html" class="graphic__table-row">
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">18</div>
                <div class="graphic__table-item">230</div>
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">63.5</div>
                <div class="graphic__table-item status">в продаже</div>
                <div class="graphic__table-img">
                    <div class="graphic__table-img-inner"><img src="/img/flat-12.png" alt=""></div>
                </div>
            </a>
            <a href="flat.html" class="graphic__table-row">
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">18</div>
                <div class="graphic__table-item">230</div>
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">63.5</div>
                <div class="graphic__table-item status">в продаже</div>
                <div class="graphic__table-img">
                    <div class="graphic__table-img-inner"><img src="/img/flat-10.jpg" alt=""></div>
                </div>
            </a>
        </div>
    </div>
    <div class="graphic__table-hide">
        <div class="graphic__table-hide-inner">
            <a href="flat.html" class="graphic__table-row">
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">18</div>
                <div class="graphic__table-item">230</div>
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">63.5</div>
                <div class="graphic__table-item status">в продаже</div>
                <div class="graphic__table-img">
                    <div class="graphic__table-img-inner"><img src="/img/flat-10.jpg" alt=""></div>
                </div>
            </a>
            <a href="flat.html" class="graphic__table-row">
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">18</div>
                <div class="graphic__table-item">230</div>
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">63.5</div>
                <div class="graphic__table-item status">в продаже</div>
                <div class="graphic__table-img">
                    <div class="graphic__table-img-inner"><img src="/img/flat-10.jpg" alt=""></div>
                </div>
            </a>
            <a href="flat.html" class="graphic__table-row">
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">18</div>
                <div class="graphic__table-item">230</div>
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">63.5</div>
                <div class="graphic__table-item status">в продаже</div>
                <div class="graphic__table-img">
                    <div class="graphic__table-img-inner"><img src="/img/flat-10.jpg" alt=""></div>
                </div>
            </a>
            <a href="flat.html" class="graphic__table-row">
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">18</div>
                <div class="graphic__table-item">230</div>
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">63.5</div>
                <div class="graphic__table-item status">в продаже</div>
                <div class="graphic__table-img">
                    <div class="graphic__table-img-inner"><img src="/img/flat-10.jpg" alt=""></div>
                </div>
            </a>
            <a href="flat.html" class="graphic__table-row">
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">18</div>
                <div class="graphic__table-item">230</div>
                <div class="graphic__table-item">2</div>
                <div class="graphic__table-item">63.5</div>
                <div class="graphic__table-item status">в продаже</div>
                <div class="graphic__table-img">
                    <div class="graphic__table-img-inner"><img src="/img/flat-10.jpg" alt=""></div>
                </div>
            </a>
        </div>
        <span class="graphic__table-hide-text">Показать еще</span>
        <a href="#filter_mod" class="btn btn_beige filters__btn">Фильтры</a>
</section>
<!-- MOBILE -->

<svg class="inline-svg">
    <symbol id="check" viewbox="0 0 12 10">
        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
    </symbol>
</svg>
