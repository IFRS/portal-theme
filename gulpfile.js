var argv         = require('minimist')(process.argv.slice(2));
var gulp         = require('gulp');
var del          = require('del');
var rename       = require('gulp-rename');
var sass         = require('gulp-sass');
var postcss      = require('gulp-postcss');
var pixrem       = require('pixrem');
var autoprefixer = require('autoprefixer');
var flexibility  = require('postcss-flexibility');
var cssmin       = require('gulp-cssmin');
var uglify       = require('gulp-uglify');
var imagemin     = require('gulp-imagemin');
var webpack      = require('webpack');
var PluginError  = require('plugin-error');
var path         = require('path');
var browserSync  = require('browser-sync').create();

require('dotenv').config();

const DIST = [
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
        outputStyle: 'expanded'
    }).on('error', sass.logError))
    .pipe(postcss(postCSSplugins))
    .pipe(gulp.dest('css/'))
    .pipe(browserSync.stream());
});

gulp.task('css', gulp.series('sass', function() {
    return gulp.src(['css/*.css', '!css/*.min.css'])
    .pipe(cssmin())
    .pipe(rename({suffix: '.min'}))
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

gulp.task('js', gulp.series('webpack', function() {
    return gulp.src(['js/*.js', '!js/*.min.js'])
    .pipe(uglify({
        ie8: true,
        mangle: false,
    }))
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('js/'))
    .pipe(browserSync.stream());
}));

gulp.task('assets', function() {
    var open_sans = gulp.src('node_modules/npm-font-open-sans/fonts/**/*')
    .pipe(gulp.dest('fonts/opensans/'));

    var bootstrap = gulp.src('node_modules/bootstrap-sass/assets/fonts/**/*')
    .pipe(gulp.dest('fonts/'));

    var fancybox = gulp.src('node_modules/jquery-fancybox/source/img/**/*')
    .pipe(gulp.dest('img/vendor/'));

    return open_sans, bootstrap, fancybox;
});

gulp.task('images', function() {
    return gulp.src('img/*.{png,jpg,gif}')
    .pipe(imagemin())
    .pipe(gulp.dest('img/'));
});

gulp.task('dist', function() {
    return gulp.src(DIST)
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

gulp.task('build', gulp.series('clean', (argv.production) ? gulp.series(gulp.parallel('css', 'js', 'assets', 'images'), 'dist') : gulp.parallel('sass', 'webpack', 'assets')));
