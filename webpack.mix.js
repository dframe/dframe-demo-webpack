const mix = require('laravel-mix');

mix
  .js('./app/Resources/js/app.js', './web/dist/js')
  .autoload({
    jquery: ['$', 'window.jQuery']
  })
  .sass('./app/Resources/styles/app.scss', './web/dist/css')
  .setPublicPath('web/dist')
  .browserSync({
    proxy: {
      target: "http://localhost:3000",
    },
    watch:true,
    files: ['./']
  });