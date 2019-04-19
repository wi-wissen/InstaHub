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

mix.js('resources/js/app.js', 'public/js').extract(['vue', 'popper.js', 'axios', 'lodash', 'bootstrap', 'codemirror'])
   .copy('resources/js/ads.js', 'public/js/ads.js')
   .copy('resources/js/jquery-app.js', 'public/js/jquery-app.js')
   .sass('resources/sass/app.scss', 'public/css')
   .disableSuccessNotifications();

if (mix.inProduction()) {
    mix.version();
}

if (!mix.inProduction()) {
    mix.sourceMaps();
    mix.browserSync('instahub.test')
}