var gulp         = require('gulp');
var gutil        = require('gulp-util');
var del          = require('del');
var rename       = require('gulp-rename');
var sass         = require('gulp-sass');
var postcss      = require('gulp-postcss');
var pixrem       = require('pixrem');
var autoprefixer = require('autoprefixer');
var flexibility  = require('postcss-flexibility');
var cssmin       = require('gulp-cssmin');
var concat       = require('gulp-concat');
var uglify       = require('gulp-uglify');
var imagemin     = require('gulp-imagemin');
var livereload   = require('gulp-livereload');
var webpack      = require('webpack');
var path         = require('path');
var es           = require('event-stream');
var critical     = require('critical');
var runSequence  = require('run-sequence');

// var dotenv = JSON.parse(fs.readFileSync('./.env.json'));

var dist = [
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

gulp.task('default', function() {
    return gulp.start('build');
});

gulp.task('build', ['clean'], function(callback) {
    runSequence(['css', 'js', 'assets'], callback);
});

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
    .pipe(livereload());
});

gulp.task('critical', ['sass'], function() {
    return crit = critical.generate({
        // Inline the generated critical-path CSS
        // - true generates HTML
        // - false generates CSS
        inline: false,

        // Your base directory
        base: path.join(path.resolve(__dirname), '.'),

        // HTML source
        // html: '<html>...</html>',

        // HTML source file
        src: gutil.env.phantomURL === undefined ? 'http://localhost' : gutil.env.phantomURL,

        // Your CSS Files (optional)
        css: ['css/vendor.css', 'css/app.css'],

        // Viewport width
        width: 1920,

        // Viewport height
        height: 1080,

        // Multiple viewport sizes
        // dimensions: [{
        //     width: 1920,
        //     height: 1080
        // }, {
        //     width: 1366,
        //     height: 768
        // }, {
        //     width: 1280,
        //     height: 1024
        // }, {
        //     width: 1280,
        //     height: 800
        // }, {
        //     width: 1024,
        //     height: 768
        // }, {
        //     width: 800,
        //     height: 600
        // }],

        // Target for final HTML output.
        // use some CSS file when the inline option is not set
        dest: 'css/critical.css',

        // Minify critical-path CSS when inlining
        minify: false,

        // Extract inlined styles from referenced stylesheets
        extract: true,

        // Complete Timeout for Operation
        // timeout: 30000,

        // Prefix for asset directory
        // pathPrefix: '/MySubfolderDocrot',

        // ignore CSS rules
        // ignore: ['font-face',/some-regexp/],

        // overwrite default options
        // ignoreOptions: {}

        // Penthouse
        penthouse: {
            blockJSRequests: false
        }
    }).error(function (err) {
        throw new gutil.PluginError('critical', err);
    });
});

gulp.task('css', ['critical'], function() {
    return gulp.src(['css/*.css', '!css/*.min.css'])
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
        livereload();
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

gulp.task('assets', function() {
    var open_sans = gulp.src('node_modules/npm-font-open-sans/fonts/**/*')
    .pipe(gulp.dest('fonts/opensans/'));

    var bootstrap = gulp.src('node_modules/bootstrap-sass/assets/fonts/**/*')
    .pipe(gulp.dest('fonts/'));

    var fancybox = gulp.src('node_modules/jquery-fancybox/source/img/**/*')
    .pipe(gulp.dest('img/vendor/'));

    return es.concat(open_sans, bootstrap, fancybox);
});

gulp.task('images', function() {
    return gulp.src('img/*.{png,jpg,gif}')
    .pipe(imagemin())
    .pipe(gulp.dest('img/'));
});

gulp.task('watch', function() {
    livereload.listen();

    gulp.watch('sass/**/*.scss', ['sass']);

    gulp.watch('src/**/*.js', ['webpack']);

    gulp.watch('**/*.php').on('change', function(file) {
        livereload.changed(file.path);
    });
});

gulp.task('dist', function() {
    return gulp.src(dist)
    .pipe(gulp.dest('dist/'));
});
