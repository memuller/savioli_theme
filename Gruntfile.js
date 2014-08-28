module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    less: {
      app: {
        files: {
          'assets/app.min.css': 'assets/less/**.less'
        }
      }
    },

    cssmin: {
      css: {
        src: [
          'assets/styles/**.css',
          'style.css',
          'assets/app.min.css'
        ],
        dest: 'assets/main.min.css'
      }
    },

    coffee: {
      compile: {
        options: {
          bare: true,
          join: true
        },
        files: {
          'assets/app.min.js': ['assets/coffee/*.coffee']
        }
      }
    },

    watch: {
      less: {
        files: ['assets/less/*.less'],
        tasks: ['less']
      },
      coffee: {
        files: ['assets/coffee/*.coffee'],
        tasks: ['coffee']
      },
      prepare:{
        options: { spawn: false },
        files: ['assets/app.min.css', 'assets/main.min.css', 'assets/app.min.js'],
        tasks: ['cssmin', 'uglify', 'version', 'notify:ready']
      }
    },

    uglify: {
      libs: {
        files: {
          'assets/main.min.js': [
            'lib/unslider.min.js','assets/app.min.js'
          ]
        }
      }
    },

    notify: {
      ready: {
        options: {
          title: 'Savioli',
          message: 'Theme files updated.'
        }
      }
    }

  });

  grunt.loadTasks('build/tasks');
  grunt.registerTask('default', ['less', 'cssmin', 'coffee', 'uglify', 'version']);
  grunt.loadNpmTasks('grunt-recess');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-coffee');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-notify');
  grunt.load
};