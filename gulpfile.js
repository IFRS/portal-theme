const argv                 = require('minimist')(process.argv.slice(2));
const autoprefixer         = require('autoprefixer');
const babel                = require('gulp-babel');
const browserSync          = require('browser-sync').create();
const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;
const cssmin               = require('gulp-cssmin');
const concat               = require('gulp-concat');
const debug                = require('gulp-debug');
const del                  = require('del');
const gulp                 = require('gulp');
const imagemin             = require('gulp-imagemin');
const path                 = require('path');
const pixrem               = require('pixrem');
const PluginError          = require('plugin-error');
const postcss              = require('gulp-postcss');
const rename               = require('gulp-rename');
const sass                 = require('gulp-sass');
const sourcemaps           = require('gulp-sourcemaps');
const through2             = require('through2');
const uglify               = require('gulp-uglify');
const webpack              = require('webpack');

const browserslist = [
    'last 3 versions',
    '>= 1%',
    'Chrome >= 45',
    'Firefox >= 38',
    'Edge >= 12',
    'Explorer >= 10',
    'iOS >= 9',
    'Safari >= 9',
    'Android >= 4.4',
    'Opera >= 30'
];

const dist = [
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
];

const webpackMode = argv.production ? 'production' : 'development';

var webpackPlugins = [];
webpackPlugins.push(new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/));
argv.bundleanalyzer ? webpackPlugins.push(new BundleAnalyzerPlugin()) : null;


gulp.task('clean', function() {
    return del(['css/', 'js/', 'fonts/', 'img/vendor/', 'dist/']);
});

gulp.task('vendor-css', function() {
    return gulp.src('./node_modules/@fancyapps/fancybox/dist/jquery.fancybox.css')
    .pipe(concat('vendor.css'))
    .pipe(gulp.dest('css/'));
});

gulp.task('sass', function() {
    let postCSSplugins = [
        require('postcss-flexibility'),
        pixrem(),
        autoprefixer({browsers: browserslist})
    ];

    return gulp.src('sass/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({
        includePaths: 'sass',
        outputStyle: 'expanded',
        precision: 8
    }).on('error', sass.logError))
    .pipe(postcss(postCSSplugins))
    .pipe(sourcemaps.write('./'))
    .pipe((argv.verbose) ? debug({title: 'SASS:'}) : through2.obj())
    .pipe(gulp.dest('css/'))
    .pipe(browserSync.stream());
});

gulp.task('styles', gulp.series('sass', function css() {
    return gulp.src(['css/*.css', '!css/*.min.css'])
    .pipe(cssmin())
    .pipe(rename({suffix: '.min'}))
    .pipe((argv.verbose) ? debug({title: 'CSS:'}) : through2.obj())
    .pipe(gulp.dest('css/'))
    .pipe(browserSync.stream());
}));

gulp.task('webpack', function(done) {
    webpack({
        mode: webpackMode,
        devtool: 'source-maps',
        entry: {
            ie: './src/ie.js',
            portal: './src/portal.js',
            datatables: './src/datatables.js'
        },
        output: {
            path: path.resolve(__dirname, 'js'),
            filename: '[name].js',
        },
        resolve: {
            alias: {
                jquery: 'jquery/src/jquery',
                popper: 'popper.js'
            }
        },
        optimization: {
            minimize: false,
            splitChunks: {
                chunks: 'all',
                cacheGroups: {
                    vendors: false,
                    default: {
                        name: 'common',
                    }
                }
            }
        },
        plugins: webpackPlugins,
    }, function(err, stats) {
        if (err) throw new PluginError('webpack', {
            message: stats.toString({
                colors: true
            })
        });
        browserSync.reload();
        done();
    });
});

gulp.task('scripts', gulp.series('webpack', function js() {
    return gulp.src(['js/*.js', '!js/*.min.js'])
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
    .pipe(rename({suffix: '.min'}))
    .pipe((argv.verbose) ? debug({title: 'JS:'}) : through2.obj())
    .pipe(gulp.dest('js/'))
    .pipe(browserSync.stream());
}));

gulp.task('assets_fontawesome', function() {
    return gulp.src('node_modules/@fortawesome/fontawesome-free/webfonts/**/fa-solid*')
    .pipe((argv.verbose) ? debug({title: 'Assets FontAwesome:'}) : through2.obj())
    .pipe(gulp.dest('fonts/fa/'));
});

gulp.task('assets', gulp.parallel('assets_fontawesome'));

gulp.task('images', function() {
    return gulp.src('img/*.{png,jpg,gif}')
    .pipe(imagemin())
    .pipe((argv.verbose) ? debug({title: 'Images:'}) : through2.obj())
    .pipe(gulp.dest('img/'));
});

gulp.task('dist', function() {
    return gulp.src(dist)
    .pipe((argv.verbose) ? debug({title: 'Dist:'}) : through2.obj())
    .pipe(gulp.dest('dist/'));
});

if (argv.production) {
    gulp.task('build', gulp.series('clean', gulp.parallel('styles', 'scripts', 'assets', 'images'), 'dist'));
} else {
    gulp.task('build', gulp.series('clean', gulp.parallel('sass', 'webpack', 'assets')));
}

gulp.task('default', gulp.series('build', function watch() {
    browserSync.init({
        ghostMode: false,
        notify: false,
        online: false,
        open: false,
        host: argv.URL || 'localhost',
        proxy: argv.URL || 'localhost',
    });

    gulp.watch('sass/**/*.scss', gulp.series('sass'));

    gulp.watch('src/**/*.js', gulp.series('webpack'));

    gulp.watch('**/*.php').on('change', browserSync.reload);
}));
