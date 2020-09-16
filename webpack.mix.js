const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');


mix.styles([
    'public/css/all.css',
    'public/css/bootstrap.min.css',
    'public/css/main.css',
    'public/css/util.css',
    'public/vendor/bootstrap/css/bootstrap.min.css',
    'public/fonts/font-awesome-4.7.0/css/font-awesome.min.css',
    'public/vendor/animate/animate.css',
    'public/vendor/css-hamburgers/hamburgers.min.css',
    'public/vendor/select2/select2.min.css',
    'public/css/util.css',
    'public/css/main.css',
    'public/css/bootstrap.min.css',
    'public/css/font-awesome.min.css',
    'public/css/elegant-icons.css',
    'public/css/nice-select.css',
    'public/css/jquery-ui.min.css',
    'public/css/owl.carousel.min.css',
    'public/css/slicknav.min.css',
    'public/css/style.css',
    'public/fonts/css2.css',
], 'public/css/app.css');

mix.scripts([
    'public/js/all.js',
    'public/js/jquery.min.js',
    'public/js/string.js',
    'public/vendor/jquery/jquery-3.2.1.min.js',
    'public/vendor/bootstrap/js/popper.js',
    'public/vendor/bootstrap/js/bootstrap.min.js',
    'public/vendor/select2/select2.min.js',
    'public/vendor/tilt/tilt.jquery.min.js',
    'public/js/jquery-3.3.1.min.js',
    'public/js/bootstrap.min.js',
    'public/js/jquery.nice-select.min.js',
    'public/js/jquery-ui.min.js',
    'public/js/jquery.slicknav.js',
    'public/js/mixitup.min.js',
    'public/js/owl.carousel.min.js',
    'public/js/main.js',
    'public/js/main2.js',
], 'public/js/app.js');
