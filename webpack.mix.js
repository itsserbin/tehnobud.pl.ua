const mix = require('laravel-mix');

mix.combine([
    'resources/js/libs/jquery.min.js',
    'resources/js/libs/bootstrap.min.js',
    'resources/js/libs/slick.min.js',
    'resources/js/libs/jquery.colorbox-min.js',

    'resources/js/main.js'], 'public/assets/js/main.js')
    .copyDirectory('resources/js/libs/map', 'public/assets/js/map')
    .sass('resources/scss/components/style.scss', 'public/assets/css')
    .copyDirectory('resources/images', 'public/assets/images')
    .copyDirectory('resources/fonts', 'public/assets/fonts')
    .disableNotifications().version();
