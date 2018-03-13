var Encore = require('@symfony/webpack-encore');

Encore
  .setOutputPath('web/build')
  .setPublicPath('/build')
  .addEntry('main', './web/assets/js/main.js')
  .enableSassLoader()
  .enableSourceMaps(!Encore.isProduction())
  .cleanupOutputBeforeBuild()
  .enableBuildNotifications()
;

module.exports = Encore.getWebpackConfig();
