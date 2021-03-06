// Include gulp
var gulp = require('gulp');

// Include Our Plugins
var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

// Lint Task
gulp.task('lint', function() {
    return gulp.src('js/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

// Compile Our Sass
gulp.task('sass', function() {
    return gulp.src('scss/style.scss')
        .pipe(sass())
        .pipe(gulp.dest(''));
});

// Concatenate & Minify JS
gulp.task('concat', function() {
	  return gulp.src('js/source/**/*.js')
		.pipe(concat('all.js'))
        .pipe(rename('all.min.js'))
		.pipe(gulp.dest('js/'));
});

gulp.task('uglify', function() {
	  return gulp.src('js/all.min.js')
        .pipe(uglify())
        .pipe(gulp.dest('js/'));
});

//gulp.task('scripts', function() {  
//    return gulp.src(js/source/**/*.js)
//        .pipe(concat('all.js'))
//        .pipe(gulp.dest('js/'))
//        .pipe(rename('all.min.js'))
//        .pipe(uglify())
//        .pipe(gulp.dest('js/'));
//});

// Watch Files For Changes
gulp.task('watch', function() {
    //gulp.watch('js/source', ['lint', 'concat']);
    gulp.watch('scss/*.scss', ['sass']);
});

// Default Task
//gulp.task('default', ['lint', 'sass', 'scripts', 'watch']);
gulp.task('default', ['lint', 'sass', 'concat']);