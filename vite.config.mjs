import { defineConfig, normalizePath } from 'vite'
import { viteStaticCopy } from 'vite-plugin-static-copy'
import { dirname, resolve } from 'path'
import { fileURLToPath } from 'url'
import { glob } from 'tinyglobby'

const _root = dirname(fileURLToPath(import.meta.url))

/** Registers theme/** files with Rollup's watcher so `vite build --watch` re-copies them on change. */
function watchThemePlugin() {
  return {
    name: 'watch-theme',
    async buildStart() {
      const files = await glob('theme/**/*', { cwd: resolve(_root), absolute: true, onlyFiles: true })
      for (const file of files) {
        this.addWatchFile(file)
      }
    },
  }
}

export default defineConfig(({ mode }) => ({
  base: './', // Generate relative asset URLs so WordPress theme URI prefix from enqueue is preserved.
  resolve: {
    alias: {
      '~': resolve(_root, 'node_modules'),
    },
  },
  css: {
    devSourcemap: true,
    preprocessorOptions: {
      scss: {
        sourceMap: true,
        quietDeps: true,
        silenceDeprecations: [ // Ignore deprecation warnings from dependencies, which we can't fix and which would otherwise spam the console during development.
          'import',
          'color-functions',
          'global-builtin',
        ],
      },
    },
  },
  build: {
    target: 'es2020',
    sourcemap: mode === 'development' ? true : false,
    assetsDir: 'assets',
    manifest: true,
    outDir: normalizePath(resolve(_root, 'build')),
    rollupOptions: {
      input: {
        /* Scripts */
        portalScript: normalizePath(resolve(_root, 'src/portal.js')),
        searchHighlightScript: normalizePath(resolve(_root, 'src/search-highlight.js')),
        datatablesScript: normalizePath(resolve(_root, 'src/datatables.js')),
        blocksScript: normalizePath(resolve(_root, 'src/blocks.js')),
        bootstrapBlocksScript: normalizePath(resolve(_root, 'src/bootstrap-blocks.js')),
        /* Styles */
        portalStyle: normalizePath(resolve(_root, 'sass/portal.scss')),
        editorStyle: normalizePath(resolve(_root, 'sass/editor-styles.scss')),
        fontsStyle: normalizePath(resolve(_root, 'sass/fonts.scss')),
        pageConcursosStyle: normalizePath(resolve(_root, 'sass/page_concursos.scss')),
        pageCursosStyle: normalizePath(resolve(_root, 'sass/page_cursos.scss')),
        pageDocumentosStyle: normalizePath(resolve(_root, 'sass/page_documentos.scss')),
        pageEditaisStyle: normalizePath(resolve(_root, 'sass/page_editais.scss')),
        pageFrontPageStyle: normalizePath(resolve(_root, 'sass/page_front-page.scss')),
        pageHomeStyle: normalizePath(resolve(_root, 'sass/page_home.scss')),
        pagePageStyle: normalizePath(resolve(_root, 'sass/page_page.scss')),
        pageSingleStyle: normalizePath(resolve(_root, 'sass/page_single.scss')),
        pluginCursosEstudeStyle: normalizePath(resolve(_root, 'sass/plugin_cursos-estude.scss')),
        datatablesStyle: normalizePath(resolve(_root, 'sass/datatables.scss')),
      },
    },
  },
  plugins: [
    watchThemePlugin(),
    viteStaticCopy({
      structured: true,
      targets: [
        {
          src: 'theme/**/*',
          dest: '.',
          rename: { stripBase: 1 },
        },
      ],
      watch: {
        reloadPageOnChange: true,
      },
    }),
  ],
}))
