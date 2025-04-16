import { readFileSync }   from 'fs'
import { deleteAsync }    from 'del'
import gulp               from 'gulp'
import parseArgs          from 'minimist'
import babel              from 'gulp-babel'
import browserSync        from 'browser-sync'
import concat             from 'gulp-concat'
import csso               from 'gulp-csso'
import * as dartSass      from 'sass-embedded'
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

const { name: themeSlug } = JSON.parse(readFileSync('./package.json'))
const { src, dest, series, parallel, watch } = gulp

const sassCompiler = gulpSass(dartSass)

const knownOptions = {
  string: [
    'url',
  ],
  boolean: [
    'production',
    'bundleanalyzer',
    'ui',
  ],
  alias: {
    'url': 'URL',
    'production': 'prod',
    'bundleanalyzer': ['wpba', 'ba'],
  },
  default: {
    'url': 'localhost',
    'production': false,
    'bundleanalyzer': false,
    'ui': false,
  },
}
const argv = parseArgs(process.argv.slice(2), knownOptions)

const IS_PRODUCTION = argv.production || argv.prod

const BROWSERSYNC_URL = argv.URL || argv.url

let webpack_plugins = []
webpack_plugins.push(new NodePolyfillPlugin())
if (argv.bundleanalyzer) webpack_plugins.push(new BundleAnalyzer.BundleAnalyzerPlugin())

async function cleanBuild() {
  return await deleteAsync(['build/**'])
};
async function cleanDist() {
  return await deleteAsync(['dist/'])
};

function sass() {
  const postCSS_plugins = [
    autoprefixer,
  ]

  const sass_options = {
    loadPaths: ['sass', 'node_modules'],
    style: 'expanded',
    quietDeps: true,
    silenceDeprecations: ['import'],
  }

  return src('sass/*.scss')
  .pipe(sourcemaps.init())
  .pipe(sassCompiler.sync(sass_options).on('error', sassCompiler.logError))
  .pipe(postCSS(postCSS_plugins))
  .pipe(sourcemaps.write('./'))
  .pipe(dest('build/css/'))
  .pipe(browserSync.stream())
}

function datatablesCSS() {
  return src([
    'node_modules/datatables.net-bs5/css/dataTables.bootstrap5.css',
    'build/css/datatables.css',
  ])
  .pipe(concat('datatables.css'))
  .pipe(dest('build/css/'))
}

function vendorCSS() {
  return src([
    'node_modules/@fancyapps/fancybox/dist/jquery.fancybox.css',
  ])
  .pipe(concat('vendor.css'))
  .pipe(dest('build/css/'))
}

function css() {
  return src(['build/css/*.css'])
  .pipe(csso())
  .pipe(dest('build/css/'))
  .pipe(browserSync.stream())
}

function bundle(done) {
  webpack({
    mode: IS_PRODUCTION ? 'production' : 'development',
    devtool: IS_PRODUCTION ? 'source-map' : 'eval-source-map',
    entry: {
      'portal': './src/portal.js',
      'datatables': './src/datatables.js',
      'blocks': './src/blocks.js',
      'bootstrap-blocks': './src/bootstrap-blocks.js',
    },
    output: {
      path: path.resolve(__dirname, 'build/js'),
      filename: '[name].js',
    },
    resolve: {
      alias: {
        'bootstrap': 'bootstrap/dist/js/bootstrap.bundle.js',
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
            name: 'commons',
            chunks: 'all',
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
  return src(['build/js/*.js'])
  .pipe(babel({
    presets: [
      [
        "@babel/env",
        {
          bugfixes: true,
          modules: false,
        }
      ]
    ]
  }))
  .pipe(uglify())
  .pipe(dest('build/js/'))
  .pipe(browserSync.stream())
}

function buildCopy() {
  return src([
    'theme/**/*',
    'favicons{,/**}',
    'fonts{,/**}',
    'img{,/**}',
    '!.**',
  ], { encoding: false })
  .pipe(dest('build/'))
}

function dist() {
  return src([
    'build/**/*',
    '!build/css/*.map',
    '!build/js/*.map',
  ], { encoding: false })
  .pipe(dest('dist/' + themeSlug))
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

  watch('theme/**/*').on('change', function(file) {
    src(file, { base: 'theme' }).pipe(dest('build/')).pipe(browserSync.stream());
  })
  watch('favicons/**/*').on('change', function(file) {
    src(file, { base: '.' }).pipe(dest('build/')).pipe(browserSync.stream());
  })
  watch('fonts/**/*').on('change', function(file) {
    src(file, { base: '.' }).pipe(dest('build/')).pipe(browserSync.stream());
  })
  watch('img/**/*').on('change', function(file) {
    src(file, { base: '.' }).pipe(dest('build/')).pipe(browserSync.stream());
  })

  watch('build/**/*').on('change', browserSync.reload)
}

const clean = parallel(cleanBuild, cleanDist);

const styles = series(sass, datatablesCSS, vendorCSS, css);

const scripts = series(bundle, js);

const build = IS_PRODUCTION ? series(clean, parallel(styles, scripts), buildCopy, dist, cleanBuild) : series(clean, parallel(series(sass, datatablesCSS, vendorCSS), bundle, buildCopy));

export { clean, sass, bundle, styles, scripts, build };

export default series(build, serve);
