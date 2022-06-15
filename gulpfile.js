'use strict'

const gulp = require('gulp'),
    sass = require('gulp-sass')(require('sass')),
    sourcemaps = require('gulp-sourcemaps'),
    clean_css = require('gulp-clean-css'),
    concat = require('gulp-concat'),
    terser = require('gulp-terser'),
    fs = require('fs'),
    md5 = require('md5');

var cssSourcePath = './resources/_src/css/*.scss',
    cssDestPath = './public/css/',
    jsSourcePath = './resources/_src/js/',
    jsDestPath = './public/js/';

function styles()
{
    return gulp.src(cssSourcePath)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(clean_css({debug: true}, (details) => {
            console.log(`File ${details.name}: ${details.stats.originalSize} bytes => ${details.stats.minifiedSize} bytes (${parseFloat(details.stats.efficiency).toFixed(2)}% less)`);
        }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(cssDestPath))
        .on('end', function () {
            updateVersion('css', cssDestPath + 'main.css')
        });
}

function scripts()
{
    return gulp.src([jsSourcePath + 'vendor/*.js', jsSourcePath + 'modules/*.js', jsSourcePath + '*.js', ])
        .pipe(sourcemaps.init())
        .pipe(terser())
        .pipe(concat('app.js'))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(jsDestPath))
        .on('end', function () {
            updateVersion('js', jsDestPath + 'app.js')
        });
}

function updateVersion(type, path) {
    fs.readFile('./version.json', function (err, data) {
        if(err) throw err;

        var versions = JSON.parse(data.toString());
        var hash = md5(fs.readFileSync(path))

        if(versions[type] != hash) {
            versions[type] = hash;
            fs.writeFileSync('./version.json', JSON.stringify(versions, null, '\t'));
            console.log(`${type.toUpperCase()} version updated`);
        }
    })
}

exports.styles = styles;
exports.scripts = scripts;