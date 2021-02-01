$(document).ready(function () {

    // ленивая загрузка картинок
    [].forEach.call(document.querySelectorAll('img[data-src]'), function (img) {
        img.setAttribute('src', img.getAttribute('data-src'));
        img.onload = function () {
            img.removeAttribute('data-src');
        };
    });

    $('input').inputmask();

    $('#phone').inputmask({
        'mask': '(999) 999-9999'
    });

    var menu_height = $('.header__inner').height();

    $(window).bind('scroll', function () {

        if ($(window).scrollTop() > 140) {

            $('.header__inner').addClass('fixed');
            $('.header__inner').addClass('header__scroll');
            $('.header__inner').css('z-index', '100');

            $('body').css({
                'padding-top': menu_height + 'px'
            });


        } else {

            $('.header__inner').removeClass('fixed');
            $('.header__inner').removeClass('header__scroll');
            $('.main').css('z-index', '2');
            $('.burger-click-region').removeClass('is-open');
            $('.burger-menu__line').removeClass('active');
            $('.header_bottom').removeClass('header-scroll__menu');
            $('body').removeAttr('style');

        }

    });

    function initScrollAction() {

        var $menu = $('.hero-menu');

        if ($menu.length) {

            var topPos = $menu.offset().top;

            var hw = $menu.width();

            $(window).scroll(function () {

                var top = $(document).scrollTop();

                if (top > topPos) {

                    $('.hero-menu').addClass('hero-menu__fixed');

                    $('.section__wrap').css({
                        'padding-left': hw + 'px',
                    })

                } else {

                    $('.hero-menu').removeClass('hero-menu__fixed');

                    $('.section__wrap').removeAttr('style');

                }

            });

        }

    }

    initScrollAction();

    $('.menu__trigger').click(function () {
        $('.menu__trigger').toggleClass('active');
        $('.menu-slide').toggleClass('open');
    });

    $(document).mouseup(function (e) {

        var div = $('.menu-slide');

        if (!div.is(e.target) && div.has(e.target).length === 0) {
            div.removeClass('open');
            $('.menu__trigger').removeClass('active');
        }

    });

    $('.hero__slider').slick({
        slidesToShow: 1,
        prevArrow: '.hero__arrow-prev',
        nextArrow: '.hero__arrow-next',
        fade: true,
        autoplay: true,
        autoplaySpeed: 4000,
    });

    $('input#inp').change(function () {

        if ($(this).prop('checked')) {
            $('.map-block__infrastructure').fadeOut().show();
            $('.map-block__description').fadeIn(100).hide();
        } else {
            $('.map-block__infrastructure').fadeIn(100).hide();
            $('.map-block__description').fadeOut().show();
        }

    });


    $('select').multipleSelect({
        placeholder: 'Все объекты',
    });

    $('.gallery-new__slider').slick({
        centerMode: true,
        slidesToShow: 1,
        initialSlide: 1,
        variableWidth: true,
        scenterPadding: '100px',
        dots: true,
        infinite: false,
        cssEase: 'linear',
        lazyLoad: 'ondemand',
        speed: 800,
        swipe: true,
        autoplay: true,
        autoplaySpeed: 5000,
        prevArrow: '.gallery__arrow-prev',
        nextArrow: '.gallery__arrow-next',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    speed: 300,
                    autoplaySpeed: 3000,
                    centerMode: false,
                    variableWidth: false,
                    autoplay: false,
                    asNavFor: '.gallery__slider_mob',
                }
            }
        ]
    });

    if ($(window).width() <= '993') {

        $('.gallery__slider_mob').slick({
            slidesToShow: 3,
            slidesToScroll: 3,
            arrows: false,
            dots: false,
            centerMode: true,
            focusOnSelect: true,
            speed: 800,
            swipe: true,
            asNavFor: '.gallery-new__slider',
            infinite: false,
        });

    }

    $('.slick-dots').insertAfter($('.gallery__arrow-prev'));

    lightbox.option({
        'showImageNumberLabel': false,
    });

    // https://github.com/timmywil/panzoom - документация

    if ($('.my-image-box').length) {

        var elem = document.querySelector('.my-image-box');

        var panzoom = Panzoom(elem, {
            panOnlyWhenZoomed: true,
            minScale: 0.8,
            maxScale: 1.8,
            contain: 'outside'
        });

        panzoom.zoom(1, {animate: true});

        setTimeout(function () {
            panzoom.pan(100, 100);
        });

        $('.range-plus').on('click', panzoom.zoomIn);

        $('.range-minus').on('click', panzoom.zoomOut);

        $('.my-image-range').on('input', (event) => {
            panzoom.zoom(event.target.valueAsNumber)
        });

        elem.addEventListener('panzoomchange', function (event) {
            $('.my-image-range').val(panzoom.getScale());
        });

    }

    $('.svg__polygon').mouseover(function () {
        $('.svg__image').hide();
    });

    $('.svg__path').mouseover(function () {
        $('.svg__image').hide();
    });

    $('.svg__polygon').mouseout(function () {
        $('.svg__image').show();
    });

    $('.svg__path').mouseout(function () {
        $('.svg__image').show();
    });

    var x_pos, y_pos;

    function updatePos(e, element) {
        x_pos = e.clientX;
        y_pos = e.clientY;
        refreshPos(element);
    }

    function getPosX() {
        return x_pos;
    }

    function getPosY() {
        return y_pos;
    }

    function refreshPos(element) {

        var w_w = window.innerWidth,
            w_h = window.innerHeight,
            pop_w = $(element).width(),
            pop_h = $(element).height();

        if (w_w < pop_w + x_pos + 100) {
            x_pos = x_pos - pop_w - 50;
        }

        if (w_h < pop_h + y_pos + 30) {
            y_pos = y_pos - pop_w / 2;
        }

    }

    $('.plan__link').on('mousemove', function (e) {

        updatePos(e, '.plan__apartment-popup');

        document.addEventListener('mousemove', updatePos(e, '.plan__apartment-popup'));

        var path = $(this).find('.plan__item'),
            number = path.data('roomNumber'),
            status = path.data('status'),
            col = path.data('col'),
            square = path.data('square'),
            x = getPosX(),
            y = getPosY();

        var $popup = $('.plan__apartment-popup'),
            $popup_number = $popup.find('.plan__room-number'),
            $popup_status = $popup.find('.plan__status'),
            $popup_col = $popup.find('.plan__col'),
            $popup_square = $popup.find('.plan__square');

        if (path.data('roomNumber')) {
            $popup_number.text(number);
        } else {
            number = '';
            $popup_number.text(number);
        }

        $popup_status.text(status);

        switch (status) {
            case 'в продаже':
                $popup_col.text(col);
                $popup_square.html(square + '<sup>2</sup>');
                break;
            case 'продано':
                $popup_col.text('');
                $popup_status.html(status);
                $popup_square.text('');
                break;
            case 'забронировано':
                $popup_col.text('');
                $popup_status.html(status);
                $popup_square.text('');
                break;
            case 'снято с продажи':
                $popup_col.text('');
                $popup_status.html(status);
                $popup_square.text('');
                break;
            default:
                $popup_col.text('');
                $popup_square.text('');
                $popup_status.text('');
        }

        if ($popup.text().replace(/\s/g, '') !== '') {
            $popup.stop().show();
        }

        $popup.css({
            'left': x - $popup.width() - $(this).closest('.remodal[data-remodal-id="plan"]').offset().left + 'px',
            'top': y - $popup.height() - $(this).closest('.remodal[data-remodal-id="plan"]').offset().top - 40 + 'px',
        });

    });

    $('.plan__item').mouseleave(function () {
        $('.plan__apartment-popup').stop().hide();
    });

    function collision($div1, $div2) {

        var x1 = $div1.offset().left;
        var w1 = 40;
        var r1 = x1 + w1;

        var x2 = $div2.offset().left;
        var w2 = 40;
        var r2 = x2 + w2;

        return (r1 < x2 || x1 > r2) ? false : true;
    }

    // Fetch Url value
    var getQueryString = function (parameter) {
        var href = window.location.href;
        var reg = new RegExp('[?&]' + parameter + '=([^&#]*)', 'i');
        var string = reg.exec(href);
        return string ? string[1] : null;
    };
    // End url

    // // slider call
    $('.floors-range').slider({
        range: true,
        min: 2,
        max: 25,
        step: 1,
        values: [getQueryString('minval') ? getQueryString('minval') : 2, getQueryString('maxval') ? getQueryString('maxval') : 25],

        slide: function (event, ui) {

            $('.ui-slider-handle:eq(0) .floors-range-min').html('' + ui.values[0]);
            $('.ui-slider-handle:eq(1) .floors-range-max').html('' + ui.values[1]);
            $('.floors-range-both').html('<i>' + ui.values[0] + ' - </i>' + ui.values[1]);

            // get values of min and max
            $('#minval').val(ui.values[0]);
            $('#maxval').val(ui.values[1]);

            if (ui.values[0] === ui.values[1]) {
                $('.floors-range-both i').css('display', 'none');
            } else {
                $('.floors-range-both i').css('display', 'inline');
            }

            if (collision($('.floors-range-min'), $('.floors-range-max'))) {
                $('.floors-range-min, .floors-range-max').css('opacity', '0');
                $('.floors-range-both').css('display', 'block');
            } else {
                $('.floors-range-min, .floors-range-max').css('opacity', '1');
                $('.floors-range-both').css('display', 'none');
            }

        }
    });

    $('.ui-slider-range').append('<span class="floors-range-both value"><i>' + $('.floors-range').slider('values', 0) + ' - </i>' + $('.floors-range').slider('values', 1) + '</span>');

    $('.ui-slider-handle:eq(0)').append('<span class="floors-range-min value">' + $('.floors-range').slider('values', 0) + '</span>');

    $('.ui-slider-handle:eq(1)').append('<span class="floors-range-max value">' + $('.floors-range').slider('values', 1) + '</span>');


    $('#square-range').slider({
        range: true,
        min: 29.88,
        max: 120,
        step: 0.1,
        values: [getQueryString('minval2') ? getQueryString('minval2') : 29.88, getQueryString('maxval2') ? getQueryString('maxval2') : 92.36],

        slide: function (event, ui) {

            $('.square .ui-slider-handle:eq(0) .square-range-min').html('' + ui.values[0]);
            $('.square .ui-slider-handle:eq(1) .square-range-max').html('' + ui.values[1]);
            $('.square-range-both').html('<i>' + ui.values[0] + ' - </i>' + ui.values[1]);

            // get values of min and max
            $('#minval2').val(ui.values[0]);
            $('#maxval2').val(ui.values[1]);

            if (ui.values[0] === ui.values[1]) {
                $('.square-range-both i').css('display', 'none');
            } else {
                $('.square-range-both i').css('display', 'inline');
            }

            if (collision($('.square-range-min'), $('.square-range-max'))) {
                $('.square-range-min, .square-range-max').css('opacity', '0');
                $('.square-range-both').css('display', 'block');
            } else {
                $('.square-range-min, .square-range-max').css('opacity', '1');
                $('.square-range-both').css('display', 'none');
            }

        }
    });

    $('.square .ui-slider-range').append('<span class="square-range-both value"><i>' + $('#square-range').slider('values', 0) + ' - </i>' + $('#square-range').slider('values', 1) + '</span>');

    $('.square .ui-slider-handle:eq(0)').append('<span class="square-range-min value">' + $('#square-range').slider('values', 0) + '</span>');

    $('.square .ui-slider-handle:eq(1)').append('<span class="square-range-max value">' + $('#square-range').slider('values', 1) + '</span>');


    $('#floors-range-mob').slider({
        range: true,
        min: 2,
        max: 25,
        step: 0.1,
        values: [getQueryString('minval2') ? getQueryString('minval2') : 2, getQueryString('maxval2') ? getQueryString('maxval2') : 25],

        slide: function (event, ui) {

            $('.floors-mob .ui-slider-handle:eq(0) .floors-mob-range-min').html('' + ui.values[0]);

            $('.floors-mob .ui-slider-handle:eq(1) .floors-mob-range-max').html('' + ui.values[1]);

            $('.floors-mob-range-both').html('<i>' + ui.values[0] + ' - </i>' + ui.values[1]);

            // get values of min and max
            $('#minval2').val(ui.values[0]);
            $('#maxval2').val(ui.values[1]);

            if (ui.values[0] === ui.values[1]) {
                $('.floors-mob-range-both i').css('display', 'none');
            } else {
                $('.floors-mob-range-both i').css('display', 'inline');
            }

            if (collision($('.floors-mob-range-min'), $('.floors-mob-range-max'))) {
                $('.floors-mob-range-min, .floors-mob-range-max').css('opacity', '0');
                $('.floors-mob-range-both').css('display', 'block');
            } else {
                $('.floors-mob-range-min, .floors-mobe-range-max').css('opacity', '1');
                $('.floors-mob-range-both').css('display', 'none');
            }

        }
    });

    $('.floors-mob .ui-slider-range').append('<span class="floors-mob-range-both value"><i>' + $('#floors-range-mob').slider('values', 0) + ' - </i>' + $('#floors-range-mob').slider('values', 1) + '</span>');

    $('.floors-mob .ui-slider-handle:eq(0)').append('<span class="floors-mob-range-min value">' + $('#floors-range-mob').slider('values', 0) + '</span>');

    $('.floors-mob .ui-slider-handle:eq(1)').append('<span class="floors-mob-range-max value">' + $('#floors-range-mob').slider('values', 1) + '</span>');


    $('#square-range-mob').slider({
        range: true,
        min: 29.88,
        max: 120,
        step: 0.1,
        values: [getQueryString('minval2') ? getQueryString('minval2') : 29.88, getQueryString('maxval2') ? getQueryString('maxval2') : 120],

        slide: function (event, ui) {

            $('.square-mob .ui-slider-handle:eq(0) .square-mob-range-min').html('' + ui.values[0]);
            $('.square-mob .ui-slider-handle:eq(1) .square-mob-range-max').html('' + ui.values[1]);
            $('.square-mob-range-both').html('<i>' + ui.values[0] + ' - </i>' + ui.values[1]);

            // get values of min and max
            $('#minval2').val(ui.values[0]);
            $('#maxval2').val(ui.values[1]);

            if (ui.values[0] === ui.values[1]) {
                $('.square-mob-range-both i').css('display', 'none');
            } else {
                $('.square-mob-range-both i').css('display', 'inline');
            }

            if (collision($('.square-mob-range-min'), $('.square-mob-range-max'))) {
                $('.square-mob-range-min, .square-mob-range-max').css('opacity', '0');
                $('.square-mob-range-both').css('display', 'block');
            } else {
                $('.square-mob-range-min, .square-mob-range-max').css('opacity', '1');
                $('.square-mob-range-both').css('display', 'none');
            }

        }
    });

    $('.square-mob .ui-slider-range').append('<span class="square-mob-range-both value"><i>' + $('#square-range-mob').slider('values', 0) + ' - </i>' + $('#square-range-mob').slider('values', 1) + '</span>');

    $('.square-mob .ui-slider-handle:eq(0)').append('<span class="square-mob-range-min value">' + $('#square-range-mob').slider('values', 0) + '</span>');

    $('.square-mob .ui-slider-handle:eq(1)').append('<span class="square-mob-range-max value">' + $('#square-range-mob').slider('values', 1) + '</span>');

    window.initHoverOnFlatTableRow = function () {

        $('.graphic__table-row').on('mousemove', function (e) {
            updatePos(e, '.graphic__popup');

            document.addEventListener('mousemove', updatePos(e, '.graphic__popup'));

            var $inner = $(this).find('.graphic__table-img-inner'),
                $img = $inner.html(),
                x = getPosX(),
                y = getPosY();

            var $popup = $('.graphic__popup');

            $popup.html($img);

            $popup.css({
                'position': 'fixed',
                'padding': '20px 40px',
                'background-color': '#fff',
                'border': '1px solid #f6f6f4',
                'box-shadow': '0 3px 7px rgba(0,0,0,.35)',
                'z-index': '5',
                'left': x - $popup.width() - $(this).closest('.remodal[data-remodal-id="graphic"]').offset().left + 'px',
                'top': y - $popup.height() - $(this).closest('.remodal[data-remodal-id="graphic"]').offset().top - 65 + 'px',
            });

            $popup.stop().show();

        });

        $('.graphic__table-row').mouseout(function () {
            $('.graphic__popup').stop().hide();
        });

    };

    window.initHoverOnFlatTableRow();

    function initTableBody() {

        $(window).on('load', function () {
            $('.graphic__table-body').mCustomScrollbar();
        });

    }

    initTableBody();

    var slick = $('.flat-slider-big-js').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        arrows: true,
        prevArrow: '.flat-slider__arrow-prev',
        nextArrow: '.flat-slider__arrow-next',
        dots: true,
        asNavFor: '.flat-slider-small-js',
    });

    var slick2 = $(".flat-slider-small-js").slick({
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 3,
        arrows: false,
        dots: false,
        vertical: true,
        asNavFor: '.flat-slider-big-js',
        focusOnSelect: true,
        adaptiveHeight: true,
    });

    $(document).on('opened', '.remodal', function () {

        $(".flat-slider-big-js").slick('setPosition');

        $(".flat-slider-small-js").slick('setPosition');

        slick.slick('refresh');

        slick2.slick('refresh');

        $(".flat-slider__arrow-prev").after($('.slick-dots'));

    });

    $('.flat-slider__arrow-prev').after($('.slick-dots'));

    $('.graphic__table-hide-text').click(function () {
        $('.graphic__table-hide-inner').slideDown();
        $(this).hide();
    });

    $('.filter_mod').parent().addClass('filter-wrap_mod');

    $('.section__path').hover(function () {
        $('.section__pin').toggle();
    });

    $('.floors__element').mousemove(function (e) {
        updatePos(e, '.floors__popup');

        document.addEventListener('mousemove', updatePos(e, '.floors__popup'));

        var level = $(this).data('level'),
            desc = $(this).data('desc'),
            x = getPosX(),
            y = getPosY();

        var $popup = $('.floors__popup'),
            $popup_level = $popup.find('.floors__level'),
            $popup_desc = $popup.find('.floors__desc');

        $popup_level.text(level);

        $popup_desc.text(desc);

        $popup.stop().show();

        $popup.css({
            'left': x + 50 + 'px',
            'top': y - $popup.height() * 2 + 'px',
        });

    });

    $('.floors__element').mouseleave(function () {
        $('.floors__popup').stop().hide();
    });

    $('.plan_mob__more').click(function () {
        $('.plan_mob__hide').toggle();
    });

    function initScrollToSection() {

        if (document.location.pathname === '/' || document.location.pathname === '/ua') {

            $('.js-scroll-to').on('click', function (e) {
                e.preventDefault();

                // hide sidebar menu
                $('.menu-slide').removeClass('open');
                $('.menu__trigger').removeClass('active');

                var anchor = $(this).attr('href');

                $('html, body').stop().animate({
                    scrollTop: $(anchor).offset().top - 200
                }, 1500);

            });

        }

        if (window.location.hash) {

            setTimeout(function () {

                $('html, body').stop().animate({
                    scrollTop: $(window.location.hash).offset().top - 200
                }, 1500);

            }, 200);

        }

    }

    initScrollToSection();

});

if ($('.js-google-maps').length) {

    class GoogleMaps {

        constructor(element, options) {
            this.element = element;

            this.init(options);

            this.onResize = this.onResize.bind(this);

            this.addEventListeners();

        }

        init(options) {

            if (document.querySelector(this.element) !== null) {
                this.map = new google.maps.Map(document.querySelector(this.element), options);
            }

        }

        renderMap(options) {
            this.map.setCenter({
                lat: options.lat,
                lng: options.lng
            });
        }

        renderMarkers(locations) {

            const {map} = this;

            var infoWindow = new google.maps.InfoWindow();

            this.markers = locations.map(function (location) {

                var marker = new google.maps.Marker(location);

                if (location.infoWindow) {

                    google.maps.event.addListener(marker, 'click', function () {
                        infoWindow.setContent(location.infoWindow.content);
                        infoWindow.open(map, marker);
                    });

                }

                return marker;
            });

        }

        renderMarkerClusterer(options) {
            new MarkerClusterer(this.map, this.markers, options);
        }

        renderRectangle(options) {
            var rectangle = new google.maps.Rectangle(options);
            rectangle.setMap(this.map);
        }

        onResize() {

            const {map} = this;

            var center = map.getCenter();

            google.maps.event.trigger(map, 'resize');

            map.setCenter(center);
        }

        addEventListeners() {
            window.addEventListener('resize', this.onResize);
        }

    }

    var googleMaps = new GoogleMaps('.js-google-maps', {
        center: {
            lat: 46.435606,
            lng: 30.737918
        },
        zoom: 17,
        disableDefaultUI: true
    });

    navigator.geolocation.getCurrentPosition(function (position) {
        return googleMaps.renderMap({
            lat: position.coords.latitude,
            lng: position.coords.longitude
        });
    }, function (error) {
        throw new Error(error);
    }, {
        enableHighAccuracy: false,
        maximumAge: 0
    });

    googleMaps.renderMarkers([{
        'icon': '/img/pin.png',
        'infoWindow': {
            'content': '<h2>Семейные традиции</h2>',
        },
        'position': {
            lat: 46.435606,
            lng: 30.737918
        },
        'title': 'Семейные традиции',
    }]);

    googleMaps.renderMarkerClusterer({
        imagePath: 'https://cdn.rawgit.com/marcobiedermann/playground/master/ui/map/google-maps/google-maps-marker/source/content/images/m'
    });

    googleMaps.renderRectangle({
        bounds: new google.maps.LatLngBounds({
            lat: -90,
            lng: -180
        }, {
            lat: 90,
            lng: 180
        }),
        fillColor: '#fff',
        fillOpacity: 0.3
    });

}