let mix = require('laravel-mix');

mix.sass('./sass/app.scss', './style.css').options({
    processCssUrls: false, // Prevent Mix from modifying URL paths in CSS
}) 

// NOW run npx mix