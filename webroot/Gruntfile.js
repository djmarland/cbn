module.exports = function(grunt) {
    grunt.initConfig({
        staticPath: 'public/static/dev',
        pkg: grunt.file.readJSON('package.json'),
        sass: {
            dist: {
                files: {
                    '<%=staticPath%>/css/global.css' : '<%=staticPath%>/scss/global.scss'
                }
            }
        },
        watch: {
            css: {
                files: '<%=staticPath%>/scss/**/*.scss',
                tasks: ['sass']
            }
        },
        jshint: {
            // Prefix a path with ! to ignore it
            files: [
                'Gruntfile.js',
                '<%=staticPath%>/js/**/*.js',
                '!<%=staticPath%>/js/vendor/**',
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
        },
    });
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.registerTask('default',['sass']);
};