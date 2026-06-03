import Mark from 'mark.js'

const isSearchPage = document.body.classList.contains('search-results') || document.body.classList.contains('search')

if (isSearchPage) {
  const container = document.querySelector('main')
  const urlParams = new URLSearchParams(window.location.search)
  const rawTerm = (container?.dataset.searchTerm || urlParams.get('s') || '').trim()

  if (rawTerm.length > 0) {
    const terms = rawTerm
      .split(/\s+/)
      .map((term) => term.trim())
      .filter((term) => term.length > 0)

    const standardTerms = terms.filter((term) => term.length > 1)
    const singleCharTerms = terms.filter((term) => term.length === 1)

    const targets = document.querySelectorAll(
      '.wp-block-query .wp-block-post-title, .wp-block-query .wp-block-post-title a, .wp-block-query .wp-block-post-excerpt'
    )

    if (targets.length > 0) {
      targets.forEach((target) => {
        const marker = new Mark(target)

        marker.unmark({
          done: () => {
            if (standardTerms.length > 0) {
              marker.mark(standardTerms, {
                className: '',
                separateWordSearch: false,
                diacritics: true,
                ignoreJoiners: true,
                exclude: ['script', 'style']
              })
            }

            if (singleCharTerms.length > 0) {
              // Single characters are marked only as exact words to avoid visual noise.
              marker.mark(singleCharTerms, {
                className: '',
                separateWordSearch: false,
                accuracy: {
                  value: 'exactly',
                  limiters: [',', '.', ':', ';', '!', '?', '-', '_', '(', ')', '[', ']', '{', '}', '/', '\\', '"', "'", '+', '=']
                },
                diacritics: true,
                ignoreJoiners: true,
                exclude: ['script', 'style']
              })
            }
          }
        })
      })
    }
  }
}
