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
var bower        = require('gulp-bower');

var dist = [
    '**',
    '!.**',
    '!node_modules{,/**}',
    '!sass{,/**}',
    '!src{,/**}',
    '!bower.json',
    '!gulpfile.js',
    '!package.json',
    '!package-lock.json'
];

gulp.task('default', function() {
    return gulp.start('build', 'dist');
});

gulp.task('build', ['clean', 'bower'], function() {
    return gulp.start('css', 'js');
});

gulp.task('bower', function() {
    return bower();
});

gulp.task('clean', function() {
    return del(['css/', 'js/', 'dist/']);
});

gulp.task('css', function() {
    var postCSSplugins = [
        pixrem(),
        autoprefixer({browsers: ['> 1%', 'last 3 versions']})
    ];
    return gulp.src('sass/*.scss')
    .pipe(sass({includePaths: 'sass', outputStyle: 'expanded'}).on('error', sass.logError))
    .pipe(gulp.dest('css/'))
    .pipe(postcss(postCSSplugins, {map: true}))
    .pipe(cssmin())
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('css/'))
    .pipe(livereload());
});

gulp.task('js', function() {
    return gulp.src('src/*.js')
    .pipe(concat('app.js'))
    .pipe(gulp.dest('js/'))
    .pipe(uglify())
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
    .pipe(gulp.dest('./dist/'));
});
