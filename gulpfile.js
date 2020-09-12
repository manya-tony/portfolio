// =========================
// プラグイン読み込み
// =========================
// gulp
const {src, dest, watch, series, parallel} = require("gulp");
// Sassをコンパイルするプラグイン
const sass = require("gulp-sass");
// cssを圧縮するプラグイン
const cleanCSS = require("gulp-clean-css");
// jsを圧縮するプラグイン
const uglify = require('gulp-uglify');
// リネームするプラグイン
const rename = require("gulp-rename");
// ベンダープレフィックスを自動でつけるプラグイン
const autoprefixer = require("gulp-autoprefixer");
// ブラウザをオートリロードするプラグイン
const browserSync = require("browser-sync");
// 画像を圧縮するプラグイン
const imagemin = require("gulp-imagemin");
const mozjpeg = require("imagemin-mozjpeg");
const pngquant = require("imagemin-pngquant");
const changed = require("gulp-changed");

// =========================
// 関数
// =========================
// scssをcssへコンパイルして圧縮
function scss() {
    return src("src/scss/app.scss")
        .pipe(sass())
        .pipe(autoprefixer({
            cascade: false
            }))
        .pipe(dest("css"))
        .pipe(cleanCSS())
        .pipe(rename({
            suffix: ".min"
        }))
        .pipe(dest("css"));
}

// ブラウザのオートリロード
function browsersync() {
    return browserSync.init({
        server: {
            baseDir: "./",
            index: "index.html"
        }});
}
function reload() {
    browserSync.reload();
    done();
}

// ファイル監視
function scssWatch() {
    return watch("src/scss/**/*.scss", series(scss, reload) );
}

// タスク終了
function kill(){
    return process.exit(0);
}

// js圧縮
function js() {
    return src('js/*.js')
        .pipe(uglify())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(dest('js'));
}

// 画像圧縮
function img() {
    var srcGlob = 'img/srcImg/*.+(jpg|jpeg|png|gif)';
    var dstGlob = 'img/distImg';
    return src(srcGlob)
        .pipe(changed(dstGlob))
        .pipe(imagemin([
            imagemin.gifsicle({interlaced: true}),
            mozjpeg({quality:50}),
            pngquant()
        ]))
        .pipe(dest(dstGlob));
}

// =========================
// 実行
// =========================
// デフォルト関数
exports.default = parallel(scssWatch, browsersync);
// 圧縮関数
exports.scss = scss;
exports.js = js;
exports.img = img;
// ファイル監視関数
exports.scssWatch = scssWatch;
// タスク終了関数
exports.kill = kill;