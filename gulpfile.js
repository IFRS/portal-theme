var gulp         = require('gulp');
var del          = require('del');
var rename       = require('gulp-rename');
var sass         = require('gulp-sass');
var postcss      = require('gulp-postcss');
var pixrem       = require('pixrem');
var autoprefixer = require('autoprefixer');
var cssmin       = require('gulp-cssmin');
var uglify       = require('gulp-uglify');
var imagemin     = require('gulp-imagemin');
var livereload   = require('gulp-livereload');


gulp.task('default', ['clean', 'images', 'css', 'js'], function() {
    return gulp.src([
        '**', '!.**',
        '!img/favicon.source.png',
        '!node_modules{,/**}',
        '!sass{,/**}',
        '!src{,/**}',
        '!bower.json', '!gulpfile.js', '!package.json'
    ])
    .pipe(gulp.dest('dist/'));
});

gulp.task('css', ['clean:css'], function() {
    var postCSSplugins = [
        pixrem(),
        autoprefixer({browsers: ['> 1%', 'last 3 versions']})
    ];
    return gulp.src('sass/*.scss')
    .pipe(sass({includePaths: 'sass', outputStyle: 'expanded'}))
    .pipe(gulp.dest('css/'))
    .pipe(postcss(postCSSplugins, {map: true}))
    .pipe(cssmin())
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('css/'))
    .pipe(livereload());
});

gulp.task('js', ['clean:js'], function() {
    return gulp.src('src/*.js')
    // .pipe(gulp.dest('js/'))
    .pipe(uglify())
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('js/'))
    .pipe(livereload());
});

gulp.task('images', function() {
    return gulp.src('img/*.{png,jpg,gif}')
    .pipe(imagemin())
    .pipe(gulp.dest('img/'));
});

gulp.task('clean:dist', function() {
    return del(['dist/']);
});

gulp.task('clean:css', function() {
    return del(['css/']);
});

gulp.task('clean:js', function() {
    return del(['js/']);
});

gulp.task('clean', function() {
    gulp.start('clean:dist', 'clean:css', 'clean:js');
});

gulp.task('watch', function() {
    livereload.listen();

    var watcherCSS = gulp.watch('sass/**/*.scss', ['css']);
    watcherCSS.on('change', function(event) {
        console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
    });

    var watcherJS = gulp.watch('src/**/*.js', ['js']);
    watcherJS.on('change', function(event) {
        console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
    });

    gulp.watch(['*.php', '**/*.php']).on('change', function(file) {
        livereload.changed(file.path);
    });
});
