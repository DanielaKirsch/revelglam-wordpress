module.exports = function(grunt) {

    grunt.initConfig({
    
        pkg: grunt.file.readJSON('package.json'),
		
		cssmin: {
			target: {
				files: [{
					expand: true,
					cwd: 'admin/css',
					src: ['*.css', '!*.min.css'],
					dest: 'admin/css',
					ext: '.min.css'
				}, {
					expand: true,
					cwd: 'public/css',
					src: ['*.css', '!*.min.css'],
					dest: 'public/css',
					ext: '.min.css'
				}]
			},			
		},
		
		uglify: {
			options: {
				compress: {
					drop_console: true
				}
			},
			my_target: {
				files: [{
					expand: true,
					cwd: 'admin/js',
					src: ['*.js', '!*.min.js'],
					dest: 'admin/js',
					ext: '.min.js'
				}, {
					expand: true,
					cwd: 'public/js',
					src: ['*.js', '!*.min.js'],
					dest: 'public/js',
					ext: '.min.js'
				}]
			},
		},
		
		watch: {
			options: {
		        livereload: true,
		    },
			css: {
				files: ['admin/css/*.css','public/css/*.css'],
				tasks: ['cssmin'],
				options: {
					spawn: false,
				},
			},
			js: {
		        files: ['admin/js/*.js','public/js/*.js'],
		        tasks: ['uglify'],
		        options: {
		            spawn: false,
		        },
		    } 
		},
		
		versioncheck: {
		    target: {
		      options: {
		        skip : [],
		        hideUpToDate : false
		      }
		    }
		 },
		 
		 copy: {
		   main: {
		     files: [
		       // makes all src relative to cwd
		       {
		       expand: true,
		       cwd: '', 
		       src: [
					'**',
					'!**/revelglam-admin.css',
					'!**/revelglam-admin.js',
					'!**/revelglam-public.css',
					'!**/revelglam-public.js',
					'!**/revelglam.css',
					'!**/#work #bigflannel #revelglam.txt',
					'!revelglam.esproj/**',
					'!node_modules/**',
					'!Gruntfile.js',
					'!package.json'],
				dest: '../revelglam-release/revelglam'},
		     ],
		   },
		 },
		 
		 compress: {
		   main: {
		     options: {
		       archive: '../revelglam-release/revelglam.zip'
		     },
		     expand: true,
		     cwd: '../revelglam-release/revelglam/',
		     src: ['**'],
		     dest: 'revelglam/'
		   }
		 }
		 
		 

    });
	
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-version-check');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-compress');
	
	grunt.registerTask('default', ['cssmin', 'uglify']);
	grunt.registerTask('version', ['versioncheck']);
	grunt.registerTask('package', ['copy', 'compress']);
	grunt.registerTask('dev', ['watch']);
	
};