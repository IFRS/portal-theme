const argv                 = require('minimist')(process.argv.slice(2));
const autoprefixer         = require('autoprefixer');
const babel                = require('gulp-babel');
const browserSync          = require('browser-sync').create();
const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;
const csso                 = require('gulp-csso');
const concat               = require('gulp-concat');
const del                  = require('del');
const gulp                 = require('gulp');
const path                 = require('path');
const pixrem               = require('pixrem');
const PluginError          = require('plugin-error');
const postcss              = require('gulp-postcss');
const sass                 = require('gulp-sass');
const sourcemaps           = require('gulp-sourcemaps');
const uglify               = require('gulp-uglify');
const webpack              = require('webpack');

gulp.task('clean', async function() {
    return await del(['css/', 'js/', 'dist/']);
});

gulp.task('vendor-css', function() {
    return gulp.src([
        './node_modules/@fancyapps/fancybox/dist/jquery.fancybox.css',
        './node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css',
    ])
    .pipe(concat('vendor.css'))
    .pipe(gulp.dest('css/'));
});

gulp.task('sass', function() {
    let postCSSplugins = [
        require('postcss-flexibility'),
        pixrem(),
        autoprefixer()
    ];

    return gulp.src('sass/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({
        includePaths: ['sass', 'node_modules'],
        outputStyle: 'expanded',
        precision: 6
    }).on('error', sass.logError))
    .pipe(postcss(postCSSplugins))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('css/'))
    .pipe(browserSync.stream());
});

gulp.task('styles', gulp.series('vendor-css', 'sass', function css() {
    return gulp.src(['css/*.css'])
    .pipe(csso())
    .pipe(gulp.dest('css/'))
    .pipe(browserSync.stream());
}));

const webpackMode = argv.production ? 'production' : 'development';
let webpackPlugins = [];
argv.bundleanalyzer ? webpackPlugins.push(new BundleAnalyzerPlugin()) : null;

gulp.task('webpack', function(done) {
    webpack({
        mode: webpackMode,
        devtool: 'source-map',
        entry: {
            ie: './src/ie.js',
            portal: './src/portal.js',
            datatables: './src/datatables.js',
        },
        output: {
            path: path.resolve(__dirname, 'js'),
            filename: '[name].js',
        },
        resolve: {
            alias: {
                jquery: 'jquery/src/jquery',
                bootstrap: 'bootstrap/dist/js/bootstrap.bundle',
            }
        },
        plugins: [
            new webpack.ProvidePlugin({
                $: 'jquery',
            }),
            new webpack.IgnorePlugin({
                resourceRegExp: /^\.\/locale$/,
                contextRegExp: /moment$/,
            }),
            ...webpackPlugins
        ],
        optimization: {
            minimize: false,
            splitChunks: {
                cacheGroups: {
                    vendors: false,
                    commons: {
                        name: "commons",
                        chunks: "all",
                        minChunks: 2,
                    }
                }
            }
        },
    }, (err, stats) => {
        if (err) throw new PluginError('webpack', {
            message: err.toString({
                colors: true
            })
        });
        if (stats.hasErrors()) throw new PluginError('webpack', {
            message: stats.toString({
                colors: true
            })
        });
        if (stats) {
            console.log(stats.toString({
                colors: true
            }));
        }
        browserSync.reload();
        done();
    });
});

gulp.task('scripts', gulp.series('webpack', function js() {
    return gulp.src(['js/*.js'])
    .pipe(babel({
        presets: [
            [
                "@babel/env",
                { "modules": false }
            ]
        ]
    }))
    .pipe(uglify({
        ie8: true,
    }))
    .pipe(gulp.dest('js/'))
    .pipe(browserSync.stream());
}));

gulp.task('dist', function() {
    return gulp.src([
        '**',
        '!.**',
        '!css/*.map',
        '!dist{,/**}',
        '!js/*.map',
        '!node_modules{,/**}',
        '!sass{,/**}',
        '!src{,/**}',
        '!gulpfile.js',
        '!package.json',
        '!package-lock.json'
    ])
    .pipe(gulp.dest('dist/ifrs-portal-theme/'));
});

if (argv.production) {
    gulp.task('build', gulp.series('clean', gulp.parallel('styles', 'scripts'), 'dist'));
} else {
    gulp.task('build', gulp.series('clean', gulp.parallel('vendor-css', 'sass', 'webpack')));
}

const proxyURL = argv.URL || argv.url || 'localhost';

gulp.task('default', gulp.series('build', function watch() {
    browserSync.init({
        ghostMode: false,
        notify: false,
        online: false,
        open: false,
        host: proxyURL,
        proxy: proxyURL,
    });

    gulp.watch('sass/**/*.scss', gulp.series('sass'));

    gulp.watch('src/**/*.js', gulp.series('webpack'));

    gulp.watch('**/*.php').on('change', browserSync.reload);
}));
