const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.sass(
	'resources/assets/sass/admin/auth.scss'
, 'public/admin/css/auth.css')
.styles([
	'public/admin/css/auth.css'
], 'public/admin/css/auth_all.css', 'public/admin');

mix.scripts([
	'public/admin/js/auth.js'
], 'public/admin/js/auth_all.js', 'public/admin');