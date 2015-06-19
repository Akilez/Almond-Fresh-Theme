module.exports = function(grunt) {
  grunt.loadNpmTasks("grunt-contrib-watch");
  grunt.loadNpmTasks('grunt-ftpush');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks("grunt-autoprefixer");
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-jshint');

  grunt.initConfig ({
    watch: {
      css: {
        // Won't trigger when .less files are changed.
        // When the compiled .less changes the .css the 'ftpush' task will update .less files too.
        files: ["sonice/**/*.css"],
        tasks: ["autoprefixer", "ftpush"]
      },
      theme: {
        // Won't trigger when .less files are changed.
        // When the compiled .less changes the .css the 'ftpush' task will update .less files too.
        files: ["sonice/**/*.php", "sonice/**/*.js", "sonice/**/*.jpg", "sonice/**/*.png"],
        tasks: ["ftpush"]
      },
      less: {
        files: "sonice/**/*.less",
        tasks: ["less:development"]
      },
      js: {
        files: [
          '<%= jshint.all %>'
        ],
        tasks: ['jshint', 'uglify']
      },
      configFiles: {
        // Watch the Gruntfile for changes, at least while still in development
        files: ["Gruntfile.js"],
        options: {
          reload: true
        }
      }
    },
    jshint: {
      options: {
        jshintrc: 'sonice/.jshintrc'
      },
      all: [
        'Gruntfile.js',
        'sonice/assets/js/*.js',
        '!sonice/assets/js/matchMedia.js',
        '!sonice/assets/js/scripts.min.js'
      ]
    },
    uglify: {
      dist: {
        files: {
          'sonice/assets/js/scripts.min.js': [
            'sonice/assets/js/plugins/bootstrap/transition.js',
            'sonice/assets/js/plugins/bootstrap/alert.js',
            'sonice/assets/js/plugins/bootstrap/button.js',
            'sonice/assets/js/plugins/bootstrap/carousel.js',
            'sonice/assets/js/plugins/bootstrap/collapse.js',
            'sonice/assets/js/plugins/bootstrap/dropdown.js',
            'sonice/assets/js/plugins/bootstrap/modal.js',
            'sonice/assets/js/plugins/bootstrap/tooltip.js',
            'sonice/assets/js/plugins/bootstrap/popover.js',
            'sonice/assets/js/plugins/bootstrap/scrollspy.js',
            'sonice/assets/js/plugins/bootstrap/tab.js',
            'sonice/assets/js/plugins/bootstrap/affix.js',
            'sonice/assets/js/plugins/*.js',
            'sonice/assets/js/_*.js',
          ]
        },
        options: {
          // JS source map: to enable, uncomment the lines below and update sourceMappingURL based on your install
          // sourceMap: 'assets/js/scripts.min.js.map',
          // sourceMappingURL: '/app/themes/roots/assets/js/scripts.min.js.map'
        }
      }
    },
    ftpush: {
      // Simple on for now, don't want to accidently delete files from the server
      build: {
        auth: {
          host: '64.69.64.77',
          port: 21,
          authKey: 'key1'
        },
        src: 'sonice',
        dest: '/wp-content/themes/sonice',
        exclusions: ['**/.DS_Store', '**/Thumbs.db', 'dist/tmp'],
        simple: true
      }
    },
    autoprefixer: {
      dev: {
        //puts files in the target directory
        flatten: true,
        //uses a globbing pattern instead of reading a single file
        expand: true,
        src: "sonice/assets/css/*.css",
        dest: "sonice/assets/css",
      }
    },
    less: {
      development: {
        files: {
          "sonice/assets/css/main.min.css": "sonice/assets/less/app.less"
        }
      },
      production: {
        options: {
          compress: true
        },
        files: {
          "sonice/assets/css/main.min.css": "sonice/assets/less/app.less"
        }
      }
    }
  });

  grunt.registerTask("default", ["watch"]);
};
