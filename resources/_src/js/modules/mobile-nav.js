var navigation = {
        svgElement: $('.logo>svg'),
        navigationBody: $('nav'),
        init: function () {
            this.initEventListeners();
        },
        initEventListeners: function () {
            $(this.svgElement).on('click', this.toggle);
        },
        toggle: function () {
            $(this.navigationBody).toggleClass('show');
        }
    };

export { navigation };