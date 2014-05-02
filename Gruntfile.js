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
        command: {

        },
        concat: {
            options: {
                separator: ';'
            }
        },
        uglify: {
            options: {
                mangle: true  // Use if you want the names of your functions and variables unchanged
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
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-commands');

    // Task definition
    grunt.registerTask('default', ['less', 'imagemin', 'watch']);
};