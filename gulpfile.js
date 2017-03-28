const gulp = require('gulp');
const clean_css = require('gulp-clean-css');
const sass = require('gulp-sass');
const concat = require('gulp-concat');
const browserify = require('gulp-browserify');
const sourcemaps = require('gulp-sourcemaps');

gulp.task('watch_scss', ['scss'], function () {
    gulp.watch(["./resources/**/**/**/*.scss"]);
});

gulp.task('watch_scripts', ['scripts'], function () {
    gulp.watch(["./resources/**/**/**/*.js"]);
});

gulp.task('watch_img', ['images'], function () {
    gulp.watch(["./resources/**/**/**/*.jpg", "./resources/**/**/**/*.png", "./resources/**/**/**/*.png"]);
});

gulp.task('scss', function () {
    return gulp.src('./resources/assets/sass/app.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(clean_css())
        .pipe(concat('app.css'))
        .pipe(sourcemaps.write('.'))
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
    return gulp.src('./resources/assets/*')
        .pipe(gulp.dest('./public/img/'))
});