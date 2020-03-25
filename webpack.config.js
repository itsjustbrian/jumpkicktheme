const path = require('path');
const glob = require('glob');
const TerserJSPlugin = require('terser-webpack-plugin');
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');

module.exports = (env, { mode }) => ({
  entry: ['./ts/main.ts', './sass/style.scss', ...glob.sync('./sass/src/*.scss')],
  output: {
    filename: 'js/[name].js',
    path: path.resolve(__dirname)
  },
  optimization: {
    minimizer: [new TerserJSPlugin({}), new OptimizeCSSAssetsPlugin()]
  },
  module: {
    rules: [
      {
        test: /\.tsx?$/,
        loader: 'ts-loader',
        exclude: /node_modules/,
      },
      {
        test: /style\.scss$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: './[name].css',
            }
          },
          'extract-loader', 'css-loader?-url', 'postcss-loader', 'sass-loader'
        ]
      },
      {
        test: /src\/.*\.scss$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: 'css/[name].css',
            }
          },
          'extract-loader', 'css-loader?-url', 'postcss-loader', 'sass-loader'
        ]
      }
    ]
  },
  resolve: {
    extensions: [".tsx", ".ts", ".js", ".scss"]
  },
});