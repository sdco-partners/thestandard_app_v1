var gulp = require('gulp');
var rename = require("gulp-rename");
var myth = require('gulp-myth');
var livereload = require('gulp-livereload');

var paths = {
  css: 'assets/css/*.css'
};

gulp.task('css', function() {
  
  return gulp.src('assets/css/myth.css')
        .pipe(myth())
        .pipe(rename('style.css'))
        .pipe(gulp.dest('assets/css/'));
  
});

gulp.task('watch', function() {
	var server = livereload();

	var reload = function(file) {
		server.changed(file.path);
	};

	gulp.watch(paths.css, ['css']);
	gulp.watch(['assets/**','**.php']).on('change', reload);
  
});

gulp.task('default', ['css','watch']);