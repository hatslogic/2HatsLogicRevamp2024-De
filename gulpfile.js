import gulp from 'gulp';
import gulpIf from 'gulp-if';
import browserSync from 'browser-sync';
import * as dartSass from 'sass';
import gulpSass from 'gulp-sass';
import htmlmin from 'gulp-htmlmin';
import uglify from 'gulp-uglify';
import concat from 'gulp-concat';
import sourcemaps from 'gulp-sourcemaps';
import htmlPartial from 'gulp-html-partial';
import cleanGulp from 'gulp-clean';
import include from 'gulp-include';
import webp from 'gulp-webp';
import purgecss from 'gulp-purgecss';

const isProd = process.env.NODE_ENV === 'prod';
const sass = gulpSass(dartSass);

const paths = {
    src: {
        html: 'src/*.html',
        sass: {
            app: 'src/assets/sass/app.scss',
            main: 'src/assets/sass/main.scss',
            plugins: 'src/assets/sass/plugins.scss',
            wp: 'src/assets/sass/wp.scss'
        },
        js: {
            main: 'src/assets/js/main.js',
            app: 'src/assets/js/app.js',
            plugins: 'src/assets/js/plugins.js'
        },
        fonts: 'src/assets/fonts/**/*',
        images: 'src/assets/img/**/*',
        uploads: 'src/uploads/**/*.{jpg,png,svg}'
    },
    dist: {
        base: 'dist/',
        css: 'dist/assets/css/',
        js: 'dist/assets/js/',
        fonts: 'dist/assets/fonts/',
        images: 'dist/assets/img/',
        uploads: 'dist/uploads/'
    }
};

function compileHTML() {
    return gulp.src(paths.src.html)
        .pipe(htmlPartial({
            basePath: 'src/includes/'
        }))
        .pipe(gulpIf(isProd, htmlmin({
            collapseWhitespace: true,
            removeComments: true
        })))
        .pipe(gulp.dest(paths.dist.base))
        .pipe(browserSync.stream()); // Stream changes to BrowserSync
}

function compileCSS(src, outputFileName) {
    return gulp.src(src)
        .pipe(gulpIf(!isProd, sourcemaps.init()))
        .pipe(sass({ outputStyle: 'compressed', importer: dartSass }).on('error', sass.logError))
        .pipe(gulpIf(!isProd, sourcemaps.write()))
        .pipe(concat(outputFileName))
        .pipe(gulpIf(isProd && outputFileName != 'wp.min.css', purgecss(
            { 
                content: ['src/**/*.html', 'src/**/*.js'],
                defaultExtractor: content => content.match(/[\w-/:]+(?<!:)/g) || []
            }
        )))
        .pipe(gulp.dest(paths.dist.css))
        .pipe(browserSync.stream()); // Stream changes to BrowserSync
}

function compileJS(src, outputFileName) {
    return gulp.src(src)
        .pipe(include()).on('error', console.log)
        .pipe(concat(outputFileName))
        .pipe(gulpIf(isProd, uglify({
            keep_fnames: true,
            mangle: false,
            ie8: true,
            warnings: true,
            compress: true
        })))
        .pipe(gulp.dest(paths.dist.js))
        .pipe(browserSync.stream()); // Stream changes to BrowserSync
}

function moveFiles(src, dest) {
    return gulp.src(src)
        .pipe(gulp.dest(dest))
        .pipe(browserSync.stream()); // Stream changes to BrowserSync
}

function convertToWebP(src, dest) {
    return gulp.src(src)
        .pipe(webp())
        .pipe(gulp.dest(dest))
        .pipe(browserSync.stream()); // Stream changes to BrowserSync
}

function serve() {
    browserSync.init({
        open: false,
        server: paths.dist.base
    });

    gulp.watch('src/**/*.html', compileHTML); // Simplified watch tasks
    gulp.watch('src/assets/sass/**/*.scss', gulp.series(cssTask));
    gulp.watch('src/assets/js/**/*.js', gulp.series(jsTask));
    gulp.watch(paths.src.images, gulp.series(imagesTask));
    gulp.watch(paths.src.uploads, gulp.series(uploadsTask));
}

function cleanDist() {
    return gulp.src(paths.dist.base, { read: false, allowEmpty: true })
        .pipe(cleanGulp());
}

// Define tasks
const htmlTask = compileHTML;
const cssTask = gulp.parallel(
    // compileCSS.bind(null, paths.src.sass.plugins, 'plugins.min.css'),
    // compileCSS.bind(null, paths.src.sass.app, 'app.min.css'),
    compileCSS.bind(null, paths.src.sass.main, 'main.min.css'),
    compileCSS.bind(null, paths.src.sass.wp, 'wp.min.css')
);
const jsTask = gulp.parallel(
    compileJS.bind(null, paths.src.js.main, 'main.min.js')
    // compileJS.bind(null, paths.src.js.main, 'app.min.js'),
    // compileJS.bind(null, paths.src.js.plugins, 'plugins.min.js')
);
const fontsTask = moveFiles.bind(null, paths.src.fonts, paths.dist.fonts);
const imagesTask = gulp.series(
    moveFiles.bind(null, paths.src.images, paths.dist.images),
    convertToWebP.bind(null, paths.src.uploads, paths.dist.uploads)
);
const uploadsTask = gulp.series(
    moveFiles.bind(null, paths.src.uploads, paths.dist.uploads),
    convertToWebP.bind(null, paths.src.images, paths.dist.images)
);
const cleanTask = cleanDist;
const serveTask = gulp.series(cleanDist, gulp.parallel(htmlTask, cssTask, jsTask, fontsTask, imagesTask, uploadsTask), serve);

// Export tasks
export {
    compileHTML,
    compileCSS,
    compileJS,
    moveFiles,
    convertToWebP,
    serve,
    cleanDist,
    htmlTask,
    cssTask,
    jsTask,
    fontsTask,
    imagesTask,
    uploadsTask,
    cleanTask,
    serveTask
};

export default gulp.series(cleanDist, gulp.parallel(compileHTML, cssTask, jsTask, fontsTask, imagesTask, uploadsTask));
