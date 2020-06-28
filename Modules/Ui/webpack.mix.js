const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/}));

const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../public').mergeManifest();

mix.js(__dirname + '/Resources/assets/js/app.js', 'js/ui.js');

const tailwindcss = require('tailwindcss');
mix.sass(__dirname + '/Resources/assets/sass/app.scss', 'css/ui.css')
  .options({
    processCssUrls: false,
    postCss: [ tailwindcss(__dirname + '/tailwind.config.js') ],
  });

if (mix.inProduction()) {
    mix.version();
}
