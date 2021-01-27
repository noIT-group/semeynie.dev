$(document).ready(function () {

    function initEstateWidget() {

        var openRemodal = function () {
            var estatePopup = $("[data-remodal-id='estate-widget']").remodal({hashTracking: false});
            estatePopup.settings.hashTracking = false;
            estatePopup.open();
        };

        var checkOnHash = function () {

            var hashString = document.location.hash;

            var hashTag = '#estate-widget';

            var $iframe = $('#estate-iframe');

            if (hashString.indexOf(hashTag) !== -1) {

                var iframeURL = $iframe.attr('data-widget-domain');

                if (hashString === hashTag) {

                    iframeURL += '/7s';

                } else {
                    hashString = hashString.replace(hashTag, '');

                    iframeURL += hashString;
                }

                $iframe.attr('src', iframeURL);

                openRemodal();

            }

        };
        checkOnHash();

        var initListenEstateWidget = function () {

            console.log('initListenEstateWidget');

            $(window).on('message', function (event) {

                var messageData = event.originalEvent.data;

                if (messageData.action === 'estateWidgetHistory') {
                    window.history.replaceState(null, null, messageData.url);
                }

            });

        };
        initListenEstateWidget();

        $('.iframe-btn').hover(function () {
            $('.iframe-btn__spoler').animate({width: "toggle"});
        });

        $(document).on('opening', '.remodal', function () {
            $('body').addClass('stop-scrolling');
        });

        $(document).on('closing', '.remodal', function (e) {
            $('body').removeClass('stop-scrolling');
            window.location.hash = '';
        });

        $('.js_popup_open').on('click', function (event) {
            event.preventDefault();

            var value = $(this).attr('data-iframe-src');

            if ($('#estate-iframe').attr('src') !== value) {
                $('#estate-iframe').attr('src', $(this).attr('data-iframe-src'));
            }

            openRemodal();

        });

    }

    function setupPhoneMask() {

        var $phone = $('.js-input-phone');

        $phone.mask('(XYZ) 00-00-000', {
            translation: {
                'X': {pattern: /0/},
                'Y': {pattern: /[3-9]/},
                'Z': {pattern: /[0-9]/}
            }
        });

        $phone.on('focus', function () {
            var $input = $(this);
            $input.attr('placeholder', '(0XX) XX-XX-XXX');
        });

        $phone.on('blur', function () {
            var $input = $(this);
            $input.attr('placeholder', 'Ваш телефон *');
        });

    }

    function initFancyBox() {

        $('[data-fancybox]').fancybox({
            loop: false,
            toolbar: 'auto',
            buttons: []
        });

    }

    function initFormYii() {

        var $form = $('form.js-form-yii');

        $form.each(function () {

            var $currentForm = $(this);
            var $formSubmit = $currentForm.find('.btn-send-handler');

            $formSubmit.on('click', function () {
                $currentForm.find('input[name="secret_form_key"]').val('not-machine');
                $currentForm.find('button[type="submit"]').click();
            });

        });

        $($form).on('beforeSubmit', function () {

            var $currentForm = $(this);

            $.ajax({
                type: $currentForm.attr('method'),
                url: $currentForm.attr('action'),
                data: $currentForm.serialize(),
                complete: function () {
                    $('.modal-close').click();
                },
                success: function (response) {

                    if(response.status !== undefined && response.status === 'success') {

                        var remodal = $('[data-remodal-id=modal__thanks]').remodal({hashTracking: false});

                        remodal.open();

                        $currentForm.trigger('reset');
                        $currentForm.find('input[name="secret_form_key"]').val('');

                    } else {

                        Swal.fire({
                            title: 'Ошибка!',
                            html: 'При отправке данных произошла ошибка.' +
                                '<br>Возможно был сбой доступа к Интернету или другая ошибка.<br><br>' +
                                'Свяжитесь, пожалуйста, с нами по телефонам.',
                            type: 'error',
                            confirmButtonText: 'Закрыть'
                        });

                    }

                },
                error: function () {

                    Swal.fire({
                        title: 'Ошибка!',
                        html: 'При отправке данных произошла ошибка.' +
                            '<br>Возможно был сбой доступа к Интернету или другая ошибка.<br><br>' +
                            'Свяжитесь, пожалуйста, с нами по телефонам.',
                        type: 'error',
                        confirmButtonText: 'Закрыть'
                    });

                }
            });

            return false;
        });

    }

    initEstateWidget();

    setupPhoneMask();

    initFancyBox();

    initFormYii();

});