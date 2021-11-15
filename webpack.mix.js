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
const publicCssFolder = 'public/css';
const publicJsFolder = 'public/js';
const publicFontFolder = 'public/fonts';
const publicCssClientFolder = 'public/css/client';
const publicCssAdminFolder = 'public/css/admin';
mix.js('resources/js/app.js', publicJsFolder)
    .js('resources/js/js.js', publicJsFolder)
    .sass('resources/scss/app.scss', publicCssFolder)
    .sass('resources/scss/view/home.scss', publicCssClientFolder)
    .sass('resources/scss/view/client/style.scss', publicCssClientFolder)
    .sass('resources/scss/view/client/login.scss', publicCssClientFolder)
    .sass('resources/scss/view/admin/login.scss', publicCssAdminFolder)
    .sass('resources/scss/view/admin/style.scss', publicCssAdminFolder)

mix.options({
    processCssUrls: false
});
