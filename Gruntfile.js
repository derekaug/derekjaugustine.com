/*global module:false*/
module.exports = function (grunt) {
    "use strict";
    //Initializing the configuration object
    grunt.initConfig({

        // Task configuration
        less: {
            options : {
                plugins : [ new (require('less-plugin-autoprefix'))({browsers : [ "> 0%" ]}) ]
            },
            development: {
                options: {
                    compress: false  //minifying the result
                },
                files: {
                    //compiling frontend.less into frontend.css
                    "www/css/main.comb.css": "www/css/src/main.less"
                }
            },
            production: {
                options: {
                    compress: true  //minifying the result
                },
                files: {
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
                files: [
                    {
                        expand: true,               // Enable dynamic expansion
                        cwd: 'www/img/src/bg/',     // Src matches are relative to this path
                        src: ['*.jpg', '*.jpeg'],       // Actual patterns to match
                        dest: 'www/img/bg/'          // Destination path prefix
                    }
                ]
            },
            png: {
                files: [
                    {
                        expand: true,               // Enable dynamic expansion
                        cwd: 'www/img/src/',     // Src matches are relative to this path
                        src: ['*.png'],       // Actual patterns to match
                        dest: 'www/img/'          // Destination path prefix
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
                node: true,
                browser: true,
                globals: {
                    "$": false,
                    "jQuery": false,
                    "Mustache": false,
                    "GLOBALS": false,
                    "module": true,
                    "browser": true
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
            vendor: {
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
                    'www/vendor/bootstrap/js/affix.js',
                    'www/vendor/mustache/mustache.js'
                ],
                dest: 'www/js/vendor.comb.js'
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
            vendor: {
                files: {
                    'www/js/vendor.min.js': ['www/js/vendor.comb.js']
                }
            }
        },

        watch: {
            less: {
                files: ['www/css/src/*.less'],
                tasks: ['less'],
                options: {
                    livereload: true
                }
            },
            js: {
                files: ['<%= concat.dja.src %>'],
                tasks: ['jshint', 'concat:dja', 'uglify:dja'],
                options: {
                    livereload: true
                }
            },
            vendor_js: {
                files: ['<%= concat.vendor.src %>'],
                tasks: ['concat:vendor', 'uglify:vendor'],
                options: {
                    livereload: true
                }
            },
            imagemin: {
                files: ['www/img/src/**/*'],
                tasks: ['imagemin'],
                options: {
                    livereload: true
                }
            },
            grunt: {
                files: ['Gruntfile.js'],
                options: {
                    livereload: false
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
