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
                <img src="/img/section2.png" alt="" class="section__img">
                <svg xmlns="http://www.w3.org/2000/svg" width="1715" height="925" viewBox="0 0 1715 925"
                     class="section__svg">
                    <a href="#plan" class="section__svg-item">
                        <path class="section__path"
                              d="M731,477l71-11,114,29,30,35,1-27-26-31L800,445l-72,11Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path class="section__path"
                              d="M729,456l71-11,122,26,24,31,1-19-28-30L801,426l-74,12Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path class="section__path"
                              d="M727,437l74-12,119,28,27,31-1-21-22-30L798,406l-73,13Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path class="section__path"
                              d="M726,418l73-13,126,27,21,29,1-23-23-24L798,387l-74,13Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path class="section__path"
                              d="M725,400l74-14,127,27,21,25,1-21-24-23L798,367l-74,13Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path class="section__path"
                              d="M724,379l75-13,127,27,23,24,1-21-22-24L798,346l-74,13v20Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path class="section__path"
                              d="M723,358l75-13,129.548,26L950,395l1-21-21.437-24-131-26L722,337Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path class="section__path"
                              d="M722,337l76.86-14,131.015,26L951,373l1-21-20.087-24L799.434,302,721,316Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path class="section__path"
                              d="M721,317l79-16,132,26,20,24,1-21-19.519-23L800.017,281,719,295Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path class="section__path"
                              d="M720,295l80-14,134,25,19,24,1-22-23-26L799.017,259,718,273Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path class="section__path"
                              d="M718,272l81-14,131,23,24,25,1-26-24-23L796,234l-80,13Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path class="section__path"
                              d="M717,247l82-14.212,131,22.8L955,281l1-24-25-25.2L796,209l-80,12.885Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path class="section__path"
                              d="M716.029,221.664l82.157-13.876,132.871,22.8L956,255l1-25-24.929-23.2L795.143,184,714,196.885Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path class="section__path"
                              d="M714,197l81.964-14.212,135.679,22.8L958,230V206l-25.321-24.2L792.857,159,712,170Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path class="section__path"
                              d="M712.438,170.23l80.971-13.023,136.232,22.108L958,207V181l-27.144-24.392L791,135l-80,10Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path class="section__path"
                              d="M711,146l80-11,141,22,26,24V156l-27.144-23.392L791,111l-81,10Z"></path>
                    </a>
                    <a href="#plan" class="section__svg-item">
                        <path class="section__path"
                              d="M708.679,120.867L789,111l143,21,26,24,1-29-27.141-20.68L790.184,85.715,707,92Z"></path>
                    </a>
                    <image xlink:href="../img/pin-section2.png" clip-path="url(#clip-ff)" width="80" height="100"
                           x="700" y="0" class="section__pin"></image>
                </svg>


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
        <div class="graphic__popup"></div>
    </div>
    <div class="graphic__table-hide">
        <div class="graphic__table-hide-inner">
            <a href="#" class="graphic__table-row">
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
            <a href="#" class="graphic__table-row">
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
            <a href="#" class="graphic__table-row">
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
            <a href="#" class="graphic__table-row">
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
            <a href="#" class="graphic__table-row">
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