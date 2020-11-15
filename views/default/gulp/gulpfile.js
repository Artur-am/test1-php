let gulp = require('gulp'),
    sass = require('gulp-sass'),
    rigger = require( "gulp-rigger" ),
    browserSync = require('browser-sync'),
    autoprefixer = require('gulp-autoprefixer'),
    concat = require('gulp-concat');

const buildPath = '../assets/';

const assets = {
    css: {
        watch: [
            buildPath + 'css/main/*.sass',
        ],
        main: [
            buildPath + 'css/main/main.sass'
        ],
        build: buildPath + 'css/'
    },
    js: {
        watch: [
            buildPath + 'js/main/*.js',
        ],
        main: [
            buildPath + 'js/main/main.js'
        ],
        build: buildPath + 'js/'
    }
};

function Task_SCSS()
{
    return gulp.src( assets.css.main )
        .pipe( sass( { outputStyle: 'expanded' } ) ) //compressed
        .pipe( autoprefixer( [ 'last 8 versions' ], { cascade: true } ) )
        .pipe( concat( 'main.min.css' ) )
        .pipe( gulp.dest( assets.css.build ) )
        .pipe( browserSync.reload( { stream: true } ) );
}

function Task_JS()
{
    return gulp.src( assets.js.main )
        .pipe(rigger())
        .pipe(concat( 'main.min.js'))
        .pipe( gulp.dest( assets.js.build ) )
        .pipe( browserSync.reload( { stream: true } ) );
}

function Task_WATCH()
{
    gulp.watch( assets.css.watch, gulp.parallel('scss') );
    gulp.watch( assets.js.watch, gulp.parallel('js') )
}

function Task_BROWSER_SYNC()
{
    browserSync.init( {
        proxy: 'http://projects.loc/'
        // server: { baseDir: '../' }
    } );
}

gulp.task( 'scss', Task_SCSS );
gulp.task( 'js', Task_JS );
gulp.task( 'browser-sync', Task_BROWSER_SYNC );
gulp.task( 'watch', Task_WATCH );
gulp.task( 'default', gulp.parallel( 'browser-sync', 'watch' ) );