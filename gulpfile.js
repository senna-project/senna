var path = require('path');
var gulp = require('gulp');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var less  = require('gulp-less');


var vendorDir = './bower_components';
var srcDir = './src/Senna/Bundle/AppBundle/Resources/assets';
var distDir = './web';

var jsFiles = [
    vendorDir + '/jquery/dist/jquery.js',
    vendorDir + '/bootstrap/dist/js/bootstrap.js',
    srcDir + '/js/app.js'
];

var lessFiles = [
    srcDir + '/styles/app.less'
];

gulp.task('default', ['build'], function() {
    gulp.start('watch');
});

gulp.task('build', [], function() {
    gulp.start('scripts', 'styles', 'public');
});

gulp.task('scripts', function () {
    gulp.src(jsFiles)
        .pipe(concat('all.js'))
        .pipe(gulp.dest(distDir + '/js/compiled'))
});


gulp.task('styles', function () {
    gulp.src(lessFiles)
        .pipe(less({
            paths: ['bower_components']
        }))
        .pipe(concat('all.css'))
        .pipe(gulp.dest(distDir + '/css/compiled'))
})


gulp.task('public', function () {

    gulp.src('./bower_components/font-awesome/fonts/**/*.{ttf,woff,woff2,eof,svg}')
        .pipe(gulp.dest('./web/fonts'));

    // Versionned assets
    gulp.src(srcDir + '/public/**/*')
        .pipe(gulp.dest(distDir))
})

gulp.task('server', function() {
});


gulp.task('watch', ['server'], function() {
    gulp.watch(srcDir + '/styles/*.less', ['styles']);
    gulp.watch(srcDir + '/styles/*.js', ['scripts']);

});

console.log('dddd');