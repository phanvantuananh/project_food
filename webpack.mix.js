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

mix.js('resources/js/app.js', publicJsFolder)
    .sass('resources/scss/app.scss', publicCssFolder)
    .sass('resources/scss/view/home.scss', publicCssFolder);

mix.options({
    processCssUrls: false
});
