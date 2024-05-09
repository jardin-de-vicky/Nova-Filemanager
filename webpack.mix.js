let mix = require('laravel-mix');

require("./nova.mix");

mix
    .setPublicPath('dist')
    .webpackConfig({
        module: {
            rules: [
                {
                    test: /\.js$/,
                    exclude: /node_modules(?!\/vue2-dropzone-vue3)|bower_components/,
                    use: {
                        loader: 'babel-loader',
                        options: {
                            presets: ['@babel/preset-env']
                        }
                    }
                },
            ]
        }
    })
    .js('resources/js/tool.js', 'js')
    .js('resources/js/field.js', 'js')
    .vue({ version: 3 })
    .nova('jdv/file-manager');