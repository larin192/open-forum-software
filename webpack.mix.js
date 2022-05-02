const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.sass('resources/_src/css/main.scss', 'css');
mix
    .js('resources/_src/js/app.js', 'js')
    .sourceMaps()
    .autoload({
        'jquery': ['$', 'window.$', 'window.jQuery'],
    });
