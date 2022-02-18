module.exports = {
  PLUGINS: {
    // https://www.npmjs.com/package/webpack-build-notifier
    notifier: false,
  },
  DEV: {
    showStats: false,
    useSourceMap: true,
    // https://webpack.js.org/configuration/devtool/
    typeSourceMap: 'source-map',
  },
};
