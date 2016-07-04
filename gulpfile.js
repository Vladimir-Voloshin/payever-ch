/**
 * Created by doomer on 7/3/16.
 */

var gulp = require('gulp'),
    less = require('gulp-less'),
    clean = require('gulp-clean');

gulp.task('default', ['clean'], function () {
    var tasks = ['images', 'fonts', 'less'];
    tasks.forEach(function (val) {
        gulp.start(val);
    });
});

gulp.task('clean', function () {
    return gulp.src(['web/css/*', 'web/js/*', 'web/images/*', 'web/fonts/*'])
        .pipe(clean());
});

gulp.task('images', function () {
    return gulp.src([
        'web-src/images/*'
    ])
        .pipe(gulp.dest('web/images/'))
});

gulp.task('fonts', function () {
    return gulp.src(['bower_components/bootstrap/fonts/*'])
        .pipe(gulp.dest('web/fonts/'))
});

gulp.task('less', function() {
    return gulp.src(['web-src/less/*.less'])
        .pipe(less({compress: true}))
        .pipe(gulp.dest('web/css/'));
});


gulp.task('watch', function () {
    var less = gulp.watch('web-src/less/*.less', ['less']);
});