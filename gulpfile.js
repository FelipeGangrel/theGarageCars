var gulp        = require('gulp');            // Automatizador de tarefas
var sass        = require('gulp-sass');       // Compilador SASS
var less        = require('gulp-less');       // Compilador LESS
var cleanCSS    = require('gulp-clean-css');  // Minificador de arquivos CSS
var concat      = require('gulp-concat');     // Concatenador de arquivos
var rename      = require('gulp-rename');     // Ferramenta pra renomear arquivos
var uglify      = require('gulp-uglify');     // Minificador de arquivos JS
var plumber     = require('gulp-plumber');    // Lidando com erros
var babel       = require('gulp-babel');      // Permitir a minificação de arquivos js escritos com padrão ES6


// Sass
gulp.task('estilos', function() {
  console.log("---- compilando estilos ----");
  gulp.src('./scss/style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(cleanCSS({compatibility: 'ie9'}))
    .pipe(gulp.dest('./css/'))
});

gulp.task('dashboard-custom', function() {
  console.log("---- compilando estilos da dashboard ----");
  gulp.src('./dashboard/dist/css/custom.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(cleanCSS({compatibility: 'ie9'}))
    .pipe(gulp.dest('./dashboard/dist/css/'))
});


gulp.task('foco-skin', function(){
  console.log("---- compilando skin da dashboard ----");
  gulp.src('./dashboard/build/less/skins/skin-foco.less')
    .pipe(less())
    .pipe(gulp.dest('./dashboard/dist/css/skins/'))
})

// Javascript
var arquivosJs = [
  'js/build/jquery-2.1.3.js',
  'js/build/sweetalert.js',
  'js/build/bootstrap.min.js',
  'js/build/touch.swipe.js',
  'js/build/validator.js',
  'js/build/jquery.maskedinput.min.js',
  'fancybox/jquery.fancybox.pack.js',
  'fancybox/jquery.fancybox.js',
  'js/build/global.js'
  // 'js/build/**/*.js' // Pegando todos arquivos com extrenção js, inclusive se dentro de diretórios
], 

destinoJs = 'js';

gulp.task('scripts', function() { 
    console.log("---- compilando scripts ----");
    gulp.src(arquivosJs)
      .pipe(plumber())
      .pipe(concat('global.js'))
      .pipe(gulp.dest(destinoJs))
      .pipe(rename('global.min.js'))
      .pipe(babel({
        presets: ['es2015']
      }))
      .pipe(uglify().on('error', function(e){
        console.log(e);
      }))
      .pipe(gulp.dest(destinoJs));
});

// monitorando por mudanças
gulp.task('default',function() {
  // Rodar tarefas inicialmente e então continuar monitorando
  gulp.start('estilos');
  gulp.watch('./scss/**/*.scss',['estilos']);

  gulp.start('dashboard-custom');
  gulp.watch('./dashboard/dist/css/custom.scss',['dashboard-custom']);

  gulp.start('foco-skin');
  gulp.watch('./dashboard/build/less/skins/skin-foco.less',['foco-skin']);

  gulp.start('scripts');
  gulp.watch(arquivosJs,['scripts']);
});