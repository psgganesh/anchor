
const mix = require('laravel-mix');

/**
 * Example of the webpack file to 
 * - copy assets
 * - minify and uglify javascript
 * - minify and uglify css
 * 
 * NOTE:
 * THIS HAS NOTHING TO DO WITH NUXT JS.
 * USE THIS ONLY IF THE / ROUTE IS A CUSTOM ROUTE
 * FROM LARAVEL
 */
mix.copy('resources/assets/img','public/img')
    .copy('resources/assets/fonts','public/fonts')
    .scripts([
     'resources/assets/js/jquery-min.js',
     'resources/assets/js/popper.min.js'
    ], 'public/js/public.js')
    .styles([
        'resources/assets/css/bootstrap.min.css',
        'resources/assets/fonts/line-icons.css'
    ], 'public/css/public.css')
    .version();


