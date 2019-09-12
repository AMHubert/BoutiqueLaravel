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
mix.sass('resources/sass/utilities.scss', 'public/resources/css');
mix.sass('resources/sass/admin.scss', 'public/resources/css');

mix.styles([
    'public/resources/css/main.css',
    'public/resources/css/utilities.css'
], 'public/resources/css/all.css');

mix.styles([
    'public/resources/css/admin.css',
    'public/resources/css/utilities.css'
], 'public/resources/css/all-admin.css');

mix.js([
    'public/resources/js/popper.min.js',
    'public/resources/bootstrap/js/bootstrap.min.js',
    'public/resources/bootstrap/js/bootstrap-spinner.js'
], 'public/resources/js/bootstrap-all.js');

