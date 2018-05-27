const gulp = require('gulp')
const sass = require('gulp-sass')
const runSequence = require('run-sequence')

gulp.task('sass', function () {
  return gulp.src('./public/stylesheets/style.sass')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./public/stylesheets'))
})
 
gulp.task('sass:watch', function () {
  gulp.watch('./public/stylesheets/**/*.sass', ['sass'])
})

gulp.task('default', done => {
  runSequence('sass', done)
})