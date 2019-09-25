const { src, dest, parallel } = require('gulp');
const minifyCSS = require('gulp-minify-css');
const sass = require('gulp-sass');
const babel = require('gulp-babel');
const uglify = require('gulp-uglify');

function css() {
  return src('./hw1/style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(dest('./build'))
    .pipe(minifyCSS())
    .pipe(dest('./build'))
    
}

function js() {
  return src('./hw1/test.js', { sourcemaps: true })
    .pipe(babel({
            presets: ['@babel/env']
        }))
    .pipe(dest('./build', { sourcemaps: true }))
    .pipe(uglify())
    .pipe(dest('./build'))
}

exports.js = js;
exports.css = css;
exports.default = parallel(css, js);