const path = require('path');
const CleanObsoleteChunksPlugin = require('webpack-clean-obsolete-chunks');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const ManifestPlugin = require('webpack-manifest-plugin');


const basePath = 'build';

module.exports = {
    entry: './assets/js/index.js',
    output: {
        path: path.resolve(__dirname, 'public'),
        filename: basePath + '/[name].[chunkhash].js'
    },
    module: {
        loaders: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                loader: 'babel-loader',
            },
            {
                test: /\.(scss)$/,
                use: ExtractTextPlugin.extract({
                    use: [
                        {
                            loader: 'css-loader',
                            options: {
                                modules: true,
                                importLoaders: 1,
                                camelCase: true,
                                localIdentName: '[local]--[hash:base64:10]',
                            }
                        },
                        'postcss-loader'
                    ]
                })
            }
        ]
    },
    plugins: [
        new CleanObsoleteChunksPlugin(),
        new ManifestPlugin({
            fileName: basePath + '/manifest.json'
        }),
        new ExtractTextPlugin(basePath + '/main.[hash].css')
    ]
};
