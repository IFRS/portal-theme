module.exports = function(grunt) {
grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    clean: {
        dist: {
            src: ['dist'],
        },
        css: {
            src: ['css'],
        },
        js: {
            src: ['js'],
        },
        favicons: {
            src: ['favicons', 'partials/favicons.php'],
        },
    },

    copy: {
        dist: {
            expand: true,
            cwd: '.',
            src: ['**', '!.**', '!img/favicon.source.png', '!node_modules/**', '!sass/**', '!src/**', '!bower.json', '!Gruntfile.js', '!package.json'],
            dest: 'dist/',
        },
    },

    cssmin: {
        options: {
            keepSpecialComments: 0,
        },
        target: {
            files: [{
                expand: true,
                cwd: 'css',
                src: ['**/*.css', '!**/*.min.css'],
                dest: 'css',
                ext: '.min.css',
            }],
        },
    },

    favicons: {
        options: {
            html: 'partials/favicons.php',
            HTMLPrefix: '<?php echo get_stylesheet_directory_uri(); ?>/favicons/',
            tileBlackWhite: false,
        },
        icons: {
            src: 'img/favicon.source.png',
            dest: 'favicons',
        },
    },

    imagemin: {
        dynamic: {
            files: [{
                expand: true,
                cwd: 'img/',
                src: ['*.{png,jpg,gif}'],
                dest: 'img/',
            }],
        },
    },

    postcss: {
        options: {
            map: true,
            processors: [
                require('pixrem')(),
                require('autoprefixer')({browsers: '> 1%, last 3 versions'}),
            ],
        },
        dist: {
            src: 'css/*.css'
        }
    },

    sass: {
        dist: {
            options: {
                // noCache: true,
                loadPath: 'sass',
                style: 'expanded',
            },
            files: [{
                expand: true,
                cwd: 'sass/',
                src: ['*.scss'],
                dest: 'css/',
                ext: '.css'
            }]
        }
    },

    uglify: {
        options: {
            mangle: false,
            compress: true,
        },
        target: {
            files: [{
                expand: true,
                cwd: 'src',
                src: ['**/*.js'],
                dest: 'js',
                ext: '.min.js',
            }],
        },
    },

    watch: {
        options: {
            livereload: true,
            livereloadOnError: false,
            spawn: false
        },
        template: {
            files: '**/*.php',
            tasks: [],
        },
        favicon: {
            files: 'img/favicon.source.png',
            tasks: ['favicons'],
        },
        css: {
            files: 'sass/*.scss',
            tasks: ['css'],
        },
        js: {
            files: 'src/*.js',
            tasks: ['js'],
        },
    },
});

    // Plugins
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-favicons');
    grunt.loadNpmTasks('grunt-postcss');


    // Tasks
    grunt.registerTask('default', [
        'build',
        'copy' // dist
    ]);

    grunt.registerTask('images', [
        'imagemin',
        'favicons'
    ]);

    grunt.registerTask('css', [
        'sass',
        'postcss',
        'cssmin'
    ]);

    grunt.registerTask('js', [
        'uglify'
    ]);

    grunt.registerTask('build', [
        'clean',
        'images',
        'css',
        'js'
    ]);
};
