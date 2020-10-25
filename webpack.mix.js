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

mix.js('resources/js/app.js', 'public/js');
mix.combine([
    'resources/css/bootstrap.min.css',
    'resources/css/font-awesome.min.css',
], 'public/css/app.min.css');
mix.styles([
    'resources/css/animate.css',
    'resources/css/main.css',
    'resources/css/prettyPhoto.css',
    'resources/css/price-range.css',
], 'public/css/app.css');
mix.copyDirectory('resources/fonts', 'public/fonts');
mix.copyDirectory('resources/images', 'public/images');

