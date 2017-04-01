const gulp = require('gulp');
const clean_css = require('gulp-clean-css');
const sass = require('gulp-sass');
const concat = require('gulp-concat');
const browserify = require('gulp-browserify');
const sourcemaps = require('gulp-sourcemaps');
const flatten = require('gulp-flatten');


gulp.task('watch_scss', ['scss'], function () {
    gulp.watch(['./resources/**/**/**/*.scss'], ['scss']);
});

gulp.task('watch_scripts', ['scripts'], function () {
    gulp.watch(['./resources/**/**/**/*.js']);
});

gulp.task('watch_img', ['images'], function () {
    gulp.watch(['./resources/**/**/**/**/*.{jpg,gif,svg,png}']);
});

gulp.task('scss', function () {
    return gulp.src('./resources/assets/sass/app.scss')
        //.pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(clean_css())
        .pipe(concat('app.css'))
        //.pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./public/css/'));
});

gulp.task('scripts', function() {
    return gulp.src('./resources/assets/js/app.js')
        .pipe(browserify({
            insertGlobals : true
        }))
        .pipe(gulp.dest('./public/js/'))
});

gulp.task('images', function() {
    return gulp.src('./resources/**/**/**/**/*.{jpg,gif,svg,png}')
        .pipe(flatten())
        .pipe(gulp.dest('./public/img/'))
});