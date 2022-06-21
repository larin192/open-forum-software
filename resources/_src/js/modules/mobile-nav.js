var navigation = {
        svgElement: $('.header__hamburger'),
        navigationBody: $('.header__nav-container'),
        init: function () {
            navigation.initEventListeners();
        },
        initEventListeners: function () {
            $(navigation.svgElement).on('click', navigation.toggle);
        },
        toggle: function () {
            $(navigation.navigationBody).toggleClass('show');
            $('body').toggleClass('nav-visible')
        }
    };