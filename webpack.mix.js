let mix = require('laravel-mix');

require("./nova.mix");

mix
    .setPublicPath('dist')
    .js('resources/js/tool.js', 'js')
    .js('resources/js/field.js', 'js')
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
    .vue({ version: 3 })
    .nova('jdv/file-manager');