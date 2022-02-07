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
mix.webpackConfig({
    stats: {
        children: true
    }
});
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/assets/sass/header.scss', 'public/css')
    .sass('resources/assets/sass/main.scss', 'public/css')
    .sass('resources/assets/sass/catalog.scss', 'public/css')
    .sass('resources/assets/sass/cabinet.scss', 'public/css')
    .sass('resources/assets/sass/blog.scss', 'public/css')
    .sass('resources/assets/sass/default.scss', 'public/css');

