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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/bootstrap.js', 'public/js')
    .js('resources/js/custom.js', 'public/js')
    .postCss('resources/css/bootstrap.css', 'public/css')
    .postCss('resources/css/font-awesome.min.css', 'public/css')
    .postCss('resources/css/responsive.css', 'public/css')
    .postCss('resources/css/style.css', 'public/css').sourceMaps();
    // .sass('resources/css/style.scss', 'public/css').sourceMaps();
