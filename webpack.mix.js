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
   .sass('resources/sass/app.scss', 'public/css')
   .styles([
      'resources/css/frontend/import.css',
      'resources/css/frontend/reset.css',
      'resources/css/frontend/plugins.css',
      'resources/css/frontend/style.css',
      'resources/css/frontend/color.css',
      'resources/css/frontend/my_frontend.css'
      ], 'public/frontend/css/frontend.css'
   )
   .scripts([
      'resources/js/frontend/jquery.min.js',
      'resources/js/frontend/plugins.js',
      'resources/js/frontend/scripts.js',
      'resources/js/frontend/my_frontend.js'
      ], 'public/frontend/js/frontend.js'
   );
