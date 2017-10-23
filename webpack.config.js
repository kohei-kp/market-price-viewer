const path = require('path');
const webpack = require('webpack');

module.exports = {

  entry: './src/main.js',
  output: {
    path: `${__dirname}/htdocs/assets/js`,
    filename: 'bundle.js',
  },
  module: {
    rules: [
      {
        test: /\.vue$/,
        use: 'vue-loader',
      },
      {
        test: /\.js$/,
        use: 'babel-loader',
        exclude: /(\/node_modules\/|test\.js|\.spec\.js$)/,
      }
    ]
  },
  resolve: {
    extensions: ['.js'],
    modules: [
      __dirname,
      path.resolve(__dirname, './node_modules')
    ],
    alias: {
      vue: 'vue/dist/vue.js'
    }
  },
  devtool: 'source-map'
};
