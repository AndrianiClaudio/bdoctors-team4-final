const mix = require("laravel-mix");

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

mix.js("resources/js/admin.js", "public/js")
    .js("resources/js/front.js", "public/js")
    .js("resources/js/translate_day.js", "public/js")
    .js("node_modules/popper.js/dist/popper.js", "public/js")
    .sourceMaps()
    .sass("resources/sass/app.scss", "public/css")
    // .sass('resources/sass/dashboard.scss', 'public/css')
    .copyDirectory(
        "node_modules/@fortawesome/fontawesome-free/webfonts",
        "public/webfonts"
    );
