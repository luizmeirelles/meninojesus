var gulp = require('gulp'),
    sass = require("gulp-sass"),
    rename = require('gulp-rename'),
    del = require('del'),
    criticalCss = require('gulp-penthouse'),
    concat = require('gulp-concat');

var paths = {
    estilos: {
        src: "assets/scss/site/*.scss",
        dest: "assets/css/site/"
    },
    css_desktop: {
        src: 'assets/css/site/*.css',
        dest: 'assets/css_critico/'
    },
};

function clean() {
    return del(['assets/css/']);
}

function estilo_desenvolvimento() {
    return gulp.src(paths.estilos.src)
        .pipe(sass({outputStyle: 'expanded'}))
        .pipe(gulp.dest(paths.estilos.dest));
}

function estilo_producao() {
    return gulp.src(paths.estilos.src)
        .pipe(sass({outputStyle: 'compressed'}))
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest(paths.estilos.dest));
}

function concatenando_desktop() {
    return gulp.src(paths.css_desktop.src)
        .pipe(concat('concat_desktop.css'))
        .pipe(gulp.dest(paths.css_desktop.dest));
}

function critical_desktop() {
    return gulp.src('assets/css_critico/concat_desktop.css')
        .pipe(criticalCss({
            out: '_desk.css',
            url: 'http://localhost/wanderson/',
            minify: true,
            width: 1920,
            height: 1080,
        }))
        .pipe(gulp.dest('assets/css_critico/css_critico'));
}

function watch() {
    gulp.watch(paths.estilos.src, estilo_desenvolvimento);
    gulp.watch(paths.estilos.src, estilo_producao);
   // gulp.watch(paths.estilos.src, concatenando_desktop);
  //  gulp.watch(paths.estilos.src, critical_desktop);
}

var build = gulp.series(
    clean,
    gulp.parallel(
        clean,
        estilo_producao,
        estilo_desenvolvimento,
        watch));

gulp.task(build);

gulp.task('default', build);