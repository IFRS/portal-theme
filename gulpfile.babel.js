import { readFileSync }   from 'fs'
import { deleteAsync }    from 'del'
import gulp               from 'gulp'
import parseArgs          from 'minimist'
import babel              from 'gulp-babel'
import browserSync        from 'browser-sync'
import concat             from 'gulp-concat'
import csso               from 'gulp-csso'
import * as dartSass      from 'sass'
import gulpSass           from 'gulp-sass'
import autoprefixer       from 'autoprefixer'
import path               from 'path'
import pluginError        from 'plugin-error'
import postCSS            from 'gulp-postcss'
import sourcemaps         from 'gulp-sourcemaps'
import uglify             from 'gulp-uglify'
import webpack            from 'webpack'
import NodePolyfillPlugin from 'node-polyfill-webpack-plugin'
import BundleAnalyzer     from 'webpack-bundle-analyzer'

browserSync.create()

const { name } = JSON.parse(readFileSync('./package.json'))
const { src, dest, series, parallel, watch } = gulp
const sassCompiler = gulpSass(dartSass)
const argv = parseArgs(process.argv.slice(2))

const IS_PRODUCTION = argv.production || argv.prod

const BROWSERSYNC_URL = argv.URL || argv.url || 'localhost'

let webpack_plugins = []
webpack_plugins.push(new NodePolyfillPlugin())
if (argv.bundleanalyzer) webpack_plugins.push(new BundleAnalyzer.BundleAnalyzerPlugin())

async function clean() {
  return await deleteAsync(['css/', 'js/', 'dist/'])
};

function sass() {
  const postCSS_plugins = [
    autoprefixer,
  ]

  const sass_options = {
    includePaths: ['sass', 'node_modules'],
    outputStyle: 'expanded',
    precision: 6,
  }

  return src('sass/*.scss')
  .pipe(sourcemaps.init())
  .pipe(sassCompiler.sync(sass_options).on('error', sassCompiler.logError))
  .pipe(postCSS(postCSS_plugins))
  .pipe(sourcemaps.write('./'))
  .pipe(dest('css/'))
  .pipe(browserSync.stream())
}

function datatablesCSS() {
  return src([
    'node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css',
    'css/datatables.css',
  ])
  .pipe(concat('datatables.css'))
  .pipe(dest('css/'))
}

function vendorCSS() {
  return src([
    'node_modules/@fancyapps/fancybox/dist/jquery.fancybox.css',
  ])
  .pipe(concat('vendor.css'))
  .pipe(dest('css/'))
}

function css() {
  return src(['css/*.css'])
  .pipe(csso())
  .pipe(dest('css/'))
  .pipe(browserSync.stream())
}

function bundle(done) {
  webpack({
    mode: IS_PRODUCTION ? 'production' : 'development',
    devtool: IS_PRODUCTION ? 'source-map' : 'eval-source-map',
    entry: {
      'portal': './src/portal.js',
      'datatables': './src/datatables.js',
    },
    output: {
      path: path.resolve(path.dirname(''), 'js'),
      filename: '[name].js',
    },
    resolve: {
      alias: {
        bootstrap: 'bootstrap/dist/js/bootstrap.bundle',
      }
    },
    externals: {
      jquery: 'jQuery',
    },
    plugins: [
      new webpack.IgnorePlugin({
        resourceRegExp: /^\.\/locale$/,
        contextRegExp: /moment$/,
      }),
      ...webpack_plugins
    ],
    optimization: {
      minimize: false,
      splitChunks: {
        cacheGroups: {
          vendors: false,
          commons: {
            name: "commons",
            chunks: "all",
            minChunks: 2,
          },
        },
      },
    },
  }, function(err, stats) {
    if (err) throw new pluginError('webpack', err.toString({ colors: true }));

    if (stats.hasErrors()) throw new pluginError('webpack', stats.toString({ colors: true }));

    browserSync.reload();

    done();
  })
}

function js() {
  return src(['js/*.js'])
  .pipe(babel({
    presets: [
      [
        "@babel/env",
        { "modules": false }
      ]
    ]
  }))
  .pipe(uglify())
  .pipe(dest('js/'))
  .pipe(browserSync.stream())
}

function dist() {
  return src([
    '**',
    '!.**',
    '!css/*.map',
    '!dist{,/**}',
    '!js/*.map',
    '!node_modules{,/**}',
    '!sass{,/**}',
    '!src{,/**}',
    '!gulpfile.js',
    '!package.json',
    '!package-lock.json'
  ])
  .pipe(dest('dist/' + name))
}

function serve() {
  browserSync.init({
    ui: argv.ui,
    ghostMode: false,
    online: false,
    open: false,
    notify: false,
    host: BROWSERSYNC_URL,
    proxy: BROWSERSYNC_URL,
  })

  watch('sass/**/*.scss', sass)

  watch('src/**/*.js', bundle)

  watch('**/*.php').on('change', browserSync.reload)
}

const styles = series(sass, datatablesCSS, vendorCSS, css);

const scripts = series(bundle, js);

const build = IS_PRODUCTION ? series(clean, parallel(styles, scripts), dist) : series(clean, parallel(series(sass, datatablesCSS, vendorCSS), bundle));

export { clean, sass, bundle, styles, scripts, build };

export default series(build, serve);
