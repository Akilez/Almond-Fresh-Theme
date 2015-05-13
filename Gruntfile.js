module.exports = function(grunt) {
  grunt.loadNpmTasks("grunt-contrib-watch");
  grunt.loadNpmTasks('grunt-ftpush');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks("grunt-autoprefixer");

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
        tasks: ["less:production"]
      },
      configFiles: {
        // Watch the Gruntfile for changes, at least while still in development
        files: ["Gruntfile.js"],
        options: {
          reload: true
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
        src: "sonice/**/*.css",
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
