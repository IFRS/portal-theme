var gulp         = require('gulp');
var gutil        = require('gulp-util');
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
var bower        = require('gulp-bower');
var rsync        = require('gulp-rsync');
var argv         = require('yargs').argv;

var dist = [
    '**',
    '!.**',
    '!img/favicon.source.png',
    '!node_modules{,/**}',
    '!sass{,/**}',
    '!src{,/**}',
    '!bower.json',
    '!gulpfile.js',
    '!package.json'
];

gulp.task('default', ['clean', 'bower'], function() {
    return gulp.start('css', 'js', 'images');
});

gulp.task('bower', function() {
    return bower();
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

gulp.task('clean', function() {
    return del(['dist/', 'css/', 'js']);
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

gulp.task('dist', ['default'], function() {
    return gulp.src(dist)
    .pipe(gulp.dest('dist/'));
});

gulp.task('deploy', ['default'], function() {
    return gulp.src(dist)
    .pipe(rsync({
        root: './',
        hostname: (argv.host === undefined ? false : argv.host),
        destination: (argv.path === undefined ? false : argv.path),
        archive: true,
        silent: false,
        compress: true
    }));
});
