/**
 * Created by doomer on 7/3/16.
 */

var clean  = require('gulp-clean'),
    concat = require('gulp-concat'),
    gulp   = require('gulp'),
    gulpif = require('gulp-if'),
    less   = require('gulp-less'),
    uglify = require('gulp-uglify');

var env = process.env.GULP_ENV;

    gulp.task('set-dev-node-env', function() {
        return process.env.NODE_ENV = 'development';
    });
    
    gulp.task('set-prod-node-env', function() {
        return process.env.NODE_ENV = 'production';
    });
    
gulp.task('default', ['set-dev-node-env'], function () {
    var tasks = ['images', 'fonts', 'less'];
    tasks.forEach(function (val) {
        gulp.start(val);
    });
});

gulp.task('clean', function () {
    return gulp.src(['web/css/*', 'web/images/*', 'web/fonts/*'])
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