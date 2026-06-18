import 'bootstrap/js/dist/collapse'
import 'bootstrap/js/dist/offcanvas'
import 'bootstrap/js/dist/dropdown'
import 'bootstrap/js/dist/tab'
import Tooltip from 'bootstrap/js/dist/tooltip'

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new Tooltip(tooltipTriggerEl))

const socialLinks = document.querySelectorAll('.wp-block-social-link-anchor')
socialLinks.forEach(link => {
  let title = link.querySelector('.wp-block-social-link-label').textContent
  new Tooltip(link, {
    placement: 'top',
    title: title,
  })
})

export default tooltipList
