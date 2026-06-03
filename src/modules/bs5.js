import 'bootstrap/js/dist/collapse'
import Tooltip from 'bootstrap/js/dist/tooltip'

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new Tooltip(tooltipTriggerEl))

export default tooltipList
