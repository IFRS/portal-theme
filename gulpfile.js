var gulp         = require('gulp');
var gutil        = require('gulp-util');
var del          = require('del');
var rename       = require('gulp-rename');
var sass         = require('gulp-sass');
var postcss      = require('gulp-postcss');
var pixrem       = require('pixrem');
var autoprefixer = require('autoprefixer');
var cssmin       = require('gulp-cssmin');
var concat       = require('gulp-concat');
var uglify       = require('gulp-uglify');
var imagemin     = require('gulp-imagemin');
var livereload   = require('gulp-livereload');
var webpack      = require('webpack');
var path         = require('path');
var es           = require('event-stream');

var dist = [
    '**',
    '!.**',
    '!node_modules{,/**}',
    '!sass{,/**}',
    '!src{,/**}',
    '!gulpfile.js',
    '!package.json',
    '!package-lock.json'
];

gulp.task('default', function() {
    return gulp.start('build');
});

gulp.task('build', ['clean'], function() {
    return gulp.start('css', 'js', 'fonts');
});

gulp.task('clean', function() {
    return del(['css/', 'js/', 'fonts/', 'dist/']);
});

gulp.task('css', function() {
    var postCSSplugins = [
        pixrem(),
        autoprefixer({browsers: ['> 1%', 'last 3 versions']})
    ];
    return gulp.src('sass/*.scss')
    .pipe(sass({
        includePaths: 'sass',
        outputStyle: 'expanded'
    }).on('error', sass.logError))
    .pipe(gulp.dest('css/'))
    .pipe(postcss(postCSSplugins, {map: true}))
    .pipe(cssmin())
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('css/'))
    .pipe(livereload());
});

gulp.task('webpack', function(callback) {
    webpack({
        entry: {
            ie: './src/_ie.js',
            app: './src/_app.js'
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
        if (err) throw new gutil.PluginError('webpack', err);
        gutil.log('[webpack]', stats.toString({
            colors: true
        }));
        callback();
    });
});

gulp.task('js', ['webpack'], function() {
    return gulp.src(['js/*.js', '!js/*.min.js'])
    .pipe(uglify({
        ie8: true,
        mangle: false,
    }))
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('js/'))
    .pipe(livereload());
});

gulp.task('fonts', function() {
    var open_sans = gulp.src('node_modules/npm-font-open-sans/fonts/**/*')
    .pipe(gulp.dest('fonts/opensans'));

    var bootstrap = gulp.src('node_modules/bootstrap-sass/assets/fonts/**/*')
    .pipe(gulp.dest('fonts/'));

    return es.concat(open_sans, bootstrap);
});

gulp.task('images', function() {
    return gulp.src('img/*.{png,jpg,gif}')
    .pipe(imagemin())
    .pipe(gulp.dest('img/'));
});

gulp.task('watch', function() {
    livereload.listen();

    gulp.watch('sass/**/*.scss', ['css']);

    gulp.watch('src/**/*.js', ['js']);

    gulp.watch('**/*.php').on('change', function(file) {
        livereload.changed(file.path);
    });
});

gulp.task('dist', function() {
    return gulp.src(dist)
    .pipe(gulp.dest('dist/'));
});
