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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');

mix.sass('resources/sass/main.scss', 'public/resources/css');

/*
mix.styles([
    'public/resources/css/main.css',
    'public/resources/css/utilities.css',
    'public/resources/bootstrap/css/bootstrap.min.css',
    'public/resources/fontawesome/css/all.min.css'
], 'public/resources/css/all.css');

mix.js([
    'public/resources/js/jquery-3.3.1.min.js',
    'public/resources/js/popper.min.js',
    'public/resources/bootstrap/js/bootstrap.min.js',
    'public/resources/bootstrap/js/bootstrap-spinner.js'
], 'public/resources/js/all.js');
*/
