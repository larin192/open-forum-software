var navigation = {
        svgElement: $('.logo>svg'),
        navigationBody: $('nav'),
        init: function () {
            navigation.initEventListeners();
        },
        initEventListeners: function () {
            $(navigation.svgElement).on('click', navigation.toggle);
        },
        toggle: function () {
            $(navigation.navigationBody).toggleClass('show');
        }
    };

module.exports = navigation;