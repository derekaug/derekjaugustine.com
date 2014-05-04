/*global module:false*/
module.exports = function (grunt) {

    //Initializing the configuration object
    grunt.initConfig({

        // Task configuration
        less    : {
            development: {
                options: {
                    compress: false  //minifying the result
                },
                files  : {
                    //compiling frontend.less into frontend.css
                    "www/css/main.comb.css": "www/css/src/main.less"
                }
            },
            production : {
                options: {
                    compress: true  //minifying the result
                },
                files  : {
                    //compiling frontend.less into frontend.css
                    "www/css/main.min.css": "www/css/main.comb.css"
                }
            }
        },
        imagemin: {
            bg: {
                options: {
                    progressive: true
                },
                files  : [
                    {
                        expand: true,               // Enable dynamic expansion
                        cwd   : 'www/img/src/bg/',     // Src matches are relative to this path
                        src   : ['*.jpg'],       // Actual patterns to match
                        dest  : 'www/img/bg/'          // Destination path prefix
                    }
                ]
            }
        },
        jshint: {
            all: {
                src: [
                    'Gruntfile.js',
                    'www/js/src/*.js'
                ]
            },
            options: {
                curly: true,
                eqeqeq: true,
                immed: true,
                latedef: true,
                newcap: true,
                noarg: true,
                sub: true,
                undef: true,
                boss: true,
                eqnull: true,
                browser: true,
                globals: {
                    "$": false,
                    "jQuery": false,
                    "GLOBALS": false
                }
            }
        },
        concat: {
            options: {
                separator: ';\n\n'
            },
            dja: {
                src: [
                    'www/js/src/dja.js'
                ],
                dest: 'www/js/dja.comb.js'
            },
            bootstrap: {
                src: [
                    'www/vendor/bootstrap/js/transition.js',
                    'www/vendor/bootstrap/js/alert.js',
                    'www/vendor/bootstrap/js/button.js',
                    'www/vendor/bootstrap/js/carousel.js',
                    'www/vendor/bootstrap/js/collapse.js',
                    'www/vendor/bootstrap/js/dropdown.js',
                    'www/vendor/bootstrap/js/modal.js',
                    'www/vendor/bootstrap/js/tooltip.js',
                    'www/vendor/bootstrap/js/popover.js',
                    'www/vendor/bootstrap/js/scrollspy.js',
                    'www/vendor/bootstrap/js/tab.js',
                    'www/vendor/bootstrap/js/affix.js'
                ],
                dest: 'www/js/vendor/bootstrap.comb.js'
            }
        },

        // Javascript Minification
        uglify: {
            options: {
                mangle: true,
                preserveComments: 'some'
            },
            dja: {
                files: {
                    'www/js/dja.min.js': ['www/js/dja.comb.js']
                }
            },
            bootstrap: {
                files: {
                    'www/js/vendor/bootstrap.min.js': ['www/js/vendor/bootstrap.comb.js']
                }
            }
        },
        watch : {
            less    : {
                files  : ['www/css/src/*.less'],
                tasks  : ['less'],
                options: {
                    livereload: true
                }
            },
            js      : {
                files  : ['www/js/src/*.js'],
                tasks  : ['jshint', 'concat', 'uglify']
            },
            imagemin: {
                files  : ['www/img/src/**/*'],
                tasks  : ['imagemin'],
                options: {
                    livereload: true
                }
            }
        }
    });

    // Plugin loading
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-commands');

    // Task definition
    grunt.registerTask('default', ['jshint', 'concat', 'uglify', 'less', 'imagemin', 'watch']);
};