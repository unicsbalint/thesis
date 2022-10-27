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

mix.js(['resources/js/app.js','resources/js/test.js','resources/js/init/app_init.js',
        'resources/js/cloud/cloud.js','resources/js/cloud/cloudMethod.js', 'resources/js/home/home.js',
        'resources/js/settings/profileSettings.js', 'resources/js/settings/homeSettings.js', 'resources/js/settings/cloudSettings.js',
        'resources/js/devices/webcam.js','resources/js/devices/leds.js'
        ], 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
    