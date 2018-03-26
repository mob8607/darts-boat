/* eslint-disable import/no-nodejs-modules*/
const path = require('path');
const CleanObsoleteChunksPlugin = require('webpack-clean-obsolete-chunks');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const ManifestPlugin = require('webpack-manifest-plugin');

const basePath = 'build';

module.exports = { // eslint-disable-line no-undef
    entry: './assets/js/index.js',
    output: {
        path: path.resolve(__dirname, 'public'), // eslint-disable-line no-undef
        filename: basePath + '/[name].[chunkhash].js',
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
                            },
                        },
                        'postcss-loader',
                    ],
                }),
            },
            {
                test: /\.css/,
                use: ExtractTextPlugin.extract({
                    use: [
                        {
                            loader: 'css-loader',
                            options: {
                                modules: false,
                            },
                        },
                    ],
                }),
            },
            {
                test:/\.(jpg|gif|png)(\?.*$|$)/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: '/' + basePath + '/images/[name].[hash].[ext]',
                        },
                    },
                ],
            },
            {
                test:/\.(svg|ttf|woff|woff2|eot)(\?.*$|$)/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: '/' + basePath + '/fonts/[name].[hash].[ext]',
                        },
                    },
                ],
            },
        ],
    },
    plugins: [
        new CleanObsoleteChunksPlugin(),
        new ManifestPlugin({
            fileName: basePath + '/manifest.json',
        }),
        new ExtractTextPlugin(basePath + '/main.[hash].css'),
    ],
};
