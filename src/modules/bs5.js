import 'bootstrap/js/dist/dropdown'
import 'bootstrap/js/dist/offcanvas'
import 'bootstrap/js/dist/tab'
import Collapse from 'bootstrap/js/dist/collapse'
import Tooltip from 'bootstrap/js/dist/tooltip'

/* Initialize tooltips */
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new Tooltip(tooltipTriggerEl))

/* Initialize tooltips for social links */
const socialLinks = document.querySelectorAll('.wp-block-social-link-anchor')
socialLinks.forEach(link => {
  let title = link.querySelector('.wp-block-social-link-label').textContent
  new Tooltip(link, {
    offset: [0, 12],
    placement: 'top',
    title: title,
  })
})

/* Collapse subpages based on viewport width */
const collapseSubpages = document.querySelectorAll('.subpages > .collapse')

const belowMd = window.matchMedia('(max-width: 767.98px)')

const syncCollapseWithBreakpoint = event => {
  collapseSubpages.forEach(collapseEl => {
    const collapse = Collapse.getOrCreateInstance(collapseEl)
    if (event.matches) {
      collapse.hide()
      return
    }

    collapse.show()
  })
}

syncCollapseWithBreakpoint(belowMd)
belowMd.addEventListener('change', syncCollapseWithBreakpoint)


export default { tooltipList, socialLinks, collapseSubpages }
