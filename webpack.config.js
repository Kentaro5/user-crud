let webpack = require('webpack');
let path = require('path');

let ExtractTextPlugin = require("extract-text-webpack-plugin");


module.exports = {

    entry: {
        main: [
            './src/scss/main.scss'
        ]
    },
    output: {
        path: path.resolve(__dirname, './webroot/js'),
        filename: 'app.js'
    },

    module: {
        rules: [
            {
                test: /\.s[ac]ss$/,
                use: ExtractTextPlugin.extract({
                    use: ['css-loader', 'sass-loader'],
                    fallback: 'style-loader',
                })

            }
        ]
    },
    plugins:[
        new ExtractTextPlugin(
            '../css/main.css'
        )
    ]

}
