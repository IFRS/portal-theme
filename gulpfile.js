const autoprefixer = require('autoprefixer');
const browserSync  = require('browser-sync').create();
const del          = require('del');
const gulp         = require('gulp');
const cssmin       = require('gulp-cssmin');
const debug        = require('gulp-debug');
const imagemin     = require('gulp-imagemin');
const postcss      = require('gulp-postcss');
const rename       = require('gulp-rename');
const sass         = require('gulp-sass');
const uglify       = require('gulp-uglify');
const merge2       = require('merge2');
const argv         = require('minimist')(process.argv.slice(2));
const path         = require('path');
const pixrem       = require('pixrem');
const PluginError  = require('plugin-error');
const flexibility  = require('postcss-flexibility');
const through2     = require('through2');
const webpack      = require('webpack');

const dist = [
    '**',
    '!.**',
    '!dist{,/**}',
    '!node_modules{,/**}',
    '!sass{,/**}',
    '!src{,/**}',
    '!gulpfile.js',
    '!package.json',
    '!package-lock.json'
];

gulp.task('clean', function() {
    return del(['css/', 'js/', 'fonts/', 'img/vendor/', 'dist/']);
});

gulp.task('sass', function() {
    var postCSSplugins = [
        require('postcss-flexibility'),
        pixrem(),
        autoprefixer({browsers: ['> 1%', 'last 3 versions', 'ie 8-10', 'not ie <= 7']})
    ];

    return gulp.src('sass/*.scss')
    .pipe(sass({
        includePaths: 'sass',
        outputStyle: 'expanded',
        precision: 8
    }).on('error', sass.logError))
    .pipe(postcss(postCSSplugins))
    .pipe((argv.debug) ? debug({title: 'SASS:'}) : through2.obj())
    .pipe(gulp.dest('css/'))
    .pipe(browserSync.stream());
});

gulp.task('styles', gulp.series('sass', function css() {
    return gulp.src(['css/*.css', '!css/*.min.css'])
    .pipe(cssmin())
    .pipe(rename({suffix: '.min'}))
    .pipe((argv.debug) ? debug({title: 'CSS:'}) : through2.obj())
    .pipe(gulp.dest('css/'))
    .pipe(browserSync.stream());
}));

gulp.task('webpack', function(done) {
    webpack({
        entry: {
            ie: './src/ie.js',
            portal: './src/portal.js'
        },
        output: {
            path: path.resolve(__dirname, 'js'),
            filename: '[name].js',
        },
        resolve: {
            alias: {
                jquery: 'jquery/src/jquery',
                bootstrap: 'bootstrap-sass'
            }
        },
        plugins: [
            new webpack.ProvidePlugin({
                $: 'jquery',
                jQuery: 'jquery'
            })
        ],
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
    .pipe(uglify({
        ie8: true,
        mangle: false,
    }))
    .pipe(rename({suffix: '.min'}))
    .pipe((argv.debug) ? debug({title: 'JS:'}) : through2.obj())
    .pipe(gulp.dest('js/'))
    .pipe(browserSync.stream());
}));

gulp.task('assets', function() {
    var open_sans = gulp.src('node_modules/npm-font-open-sans/fonts/**/*')
    .pipe((argv.debug) ? debug({title: 'Assets OpenSans:'}) : through2.obj())
    .pipe(gulp.dest('fonts/opensans/'));

    var bootstrap = gulp.src('node_modules/bootstrap-sass/assets/fonts/**/*')
    .pipe((argv.debug) ? debug({title: 'Assets Bootstrap:'}) : through2.obj())
    .pipe(gulp.dest('fonts/'));

    var fancybox = gulp.src('node_modules/jquery-fancybox/source/img/**/*')
    .pipe((argv.debug) ? debug({title: 'Assets Fancybox:'}) : through2.obj())
    .pipe(gulp.dest('img/vendor/'));

    return merge2(open_sans, bootstrap, fancybox);
});

gulp.task('images', function() {
    return gulp.src('img/*.{png,jpg,gif}')
    .pipe(imagemin())
    .pipe((argv.debug) ? debug({title: 'Images:'}) : through2.obj())
    .pipe(gulp.dest('img/'));
});

gulp.task('dist', function() {
    return gulp.src(dist)
    .pipe((argv.debug) ? debug({title: 'Dist:'}) : through2.obj())
    .pipe(gulp.dest('dist/'));
});

gulp.task('default', function() {
    browserSync.init({
        ui: false,
        notify: false,
        online: false,
        open: false,
        host: argv.URL || 'localhost',
        proxy: argv.URL || 'localhost',
    });

    gulp.watch('sass/**/*.scss', gulp.series('sass'));

    gulp.watch('src/**/*.js', gulp.series('webpack'));

    gulp.watch('**/*.php').on('change', browserSync.reload);
});

if (argv.production) {
    gulp.task('build', gulp.series('clean', gulp.parallel('styles', 'scripts', 'assets', 'images'), 'dist'));
} else {
    gulp.task('build', gulp.series('clean', gulp.parallel('sass', 'webpack', 'assets')));
}
