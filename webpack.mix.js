const mix = require('laravel-mix');

mix.webpackConfig(webpack => {
    return {
        plugins: [
            new webpack.DefinePlugin({
                __VUE_OPTIONS_API__: 'true',
                __VUE_PROD_DEVTOOLS__: 'false',
                __VUE_PROD_HYDRATION_MISMATCH_DETAILS__: 'false'
            })
        ]
    };
});

mix.js('resources/js/app.js', 'public/build/assets').vue()
    .sass('resources/scss/app.scss', 'public/build/assets')
    .sourceMaps(false, 'source-map')
    .version();
