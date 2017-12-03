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
      },
      {
        test: /\.css$/,
        use: [
          'style-loader',
          'css-loader'
        ]
      },
      {
        test: /\.(png|woff|woff2|eot|ttf|svg)$/,
        use: 'url-loader?limit=100000'
      }
    ]
  },
  resolve: {
    extensions: ['.js', '.css'],
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
