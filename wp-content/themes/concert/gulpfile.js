//------------| import all your plugins |-------------//
const gulp = require('gulp')
const phpConnect = require('gulp-connect-php')
const browserSync = require('browser-sync').create()
const pleeease = require('gulp-pleeease')
const sass = require('gulp-sass')
const del = require('del')
const image = require('gulp-image')
const sourcemaps = require('gulp-sourcemaps')
const rename = require('gulp-rename')

// JS plugins
const babel = require('gulp-babel')
const concat = require('gulp-concat') // JS Concatenation.
const uglify = require('gulp-uglify') // JS Minify.
const babelify = require('babelify')
const browserify = require('browserify')
const source = require('vinyl-source-stream')
const buffer = require('vinyl-buffer')

// SHORTCUT JS
var jsSRC = 'script.js'
var jsFOLDER = './assets/js/'
var jsDIST = './dist/js/'
var jsWATCH = './assets/js/**.*.js'
var jsFILES = [jsSRC]

//---------------| BrowserSync init |---------------//

function browserSyncInit (done) {
  browserSync.init({
    // server: {
    //   baseDir: './' //from dist folder
    // },
    proxy: 'http://localhost:8888/Concert_2_0/' // Change it for your url !!!
  })
  done()
}

//---------------| BrowserSync Reload |---------------//

function browserSyncReload (done) {
  browserSync.reload()
  done()
}

//------------| JS concatenated, minified + run to ES5 |------------//

function js (done) {
  jsFILES.map(function (entry) {
    done()
    return browserify({
      entries: [jsFOLDER + entry]
    })
      .transform(babelify, { presets: ['@babel/preset-env'] })
      .bundle()
      .pipe(source(entry))
      .pipe(rename({ extname: '.min.js' }))
      .pipe(buffer())
      .pipe(sourcemaps.init({ loadMaps: true }))
      .pipe(uglify())
      .pipe(sourcemaps.write('./'))
      .pipe(gulp.dest(jsDIST))
  })
}

//---------| SCSS to CSS + minified, concatenated |-------------//

function css () {
  return gulp
    .src('assets/scss/styles.scss')
    .pipe(sourcemaps.init())
    .pipe(sass())
    .pipe(pleeease())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('dist/css'))
    .pipe(
      browserSync.stream({
        stream: true
      })
    )
}

//---------------| Compress lightly images |---------------//

function img () {
  return gulp
    .src('assets/images/*')
    .pipe(image())
    .pipe(gulp.dest('dist/images'))
}

//---------------| Fonts |---------------//
function fonts () {
  return gulp.src('assets/fonts/*.{woff,woff2}').pipe(gulp.dest('dist/fonts'))
}

//---------------| Copy SVG |---------------//

// function svg () {
//   return gulp
//     .src('assets/svg/*')
//     .pipe(image())
//     .pipe(gulp.dest('dist/svg'))
// }

//---------------| Clean dist files |---------------//
function clean () {
  return del('dist/**/*.css'), del('dist/images/*')
}

//---------------| Watch files |---------------//
function watch () {
  gulp.watch('assets/scss/**/*.scss', css)
  gulp
    .watch('**/*.{html, twig, php}', gulp.series(browserSyncReload))
    .on('change', function (event) {
      console.log(event + ' a été modifié')
    })
  gulp.watch('assets/images/*', img)
  gulp.watch('assets/js/**/*', js)
  gulp.watch('./*.php').on('change', browserSync.reload)
  // gulp.watch('assets/svg/*', svg)
}

//---------------| GLOBAL TASK |---------------//

const javaScript = gulp.series(js)
const build = gulp.series(clean, gulp.parallel(css, img, /* svg, */ fonts, js))
const watchFiles = gulp.parallel(watch, browserSyncInit)

exports.css = css
exports.js = javaScript
exports.img = img
// exports.svg = svg
exports.fonts = fonts
exports.clean = clean
exports.build = build
exports.watch = watchFiles
exports.default = build

// run html, scss, js, img, server, and WATCH !
