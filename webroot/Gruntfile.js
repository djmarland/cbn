module.exports = function(grunt) {
    grunt.initConfig({
        staticPath: 'public/static/dev',
        pkg: grunt.file.readJSON('package.json'),
        watch: {
            sass: {
                files: ['<%=staticPath%>/scss/**/*.scss}'],
                tasks: ['sass:dist']
            },
            livereload: {
                files: ['*.html', '*.php', 'js/**/*.{js,json}', 'css/*.css','img/**/*.{png,jpg,jpeg,gif,webp,svg}'],
                options: {
                    livereload: true
                }
            }
        },
        sass: {
            options: {
                sourceComments: 'map',
                outputStyle: 'compressed'
            },
            dist: {
                files: {
                    '<%=staticPath%>/css/global.css': '<%=staticPath%>/scss/global.scss'
                }
            }
        },
        jshint: {
            // Prefix a path with ! to ignore it
            files: [
                'Gruntfile.js',
                '<%=staticPath%>/js/**/*.js',
                '!<%=staticPath%>/js/vendor/**'
            ],
            options: {
                globals: {
                    // AMD
                    module:     true,
                    require:    true,
                    requirejs:  true,
                    define:     true,

                    // Environments
                    console:    true,

                    // General Purpose Libraries
                    $:          true,
                    jQuery:     true,

                    // Testing
                    test:    true,
                    ok:      true,
                    equal:   true,
                    notEqual: true,
                    strictEqual: true,
                    notStrictEqual: true,
                    deepEqual: true,
                    notDeepEqual: true
                }
            }
        },

        uglify : {
            build : {
                files: grunt.file.expandMapping(['<%=staticPath%>/js/**/*.js'], '<%=staticPath%>/js-min/', {
                        rename: function(destBase, destPath) {
                            return destBase+destPath.replace('.js', '.min.js');
                        }
                })
            }
        }
    });

    grunt.registerTask('default', ['sass:dist']);
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify');
};