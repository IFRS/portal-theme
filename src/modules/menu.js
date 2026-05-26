const menuPrincipalResizeObserver = new ResizeObserver((entries) => {
  for (const entry of entries) {
    if (entry.contentBoxSize) {
      entry.target.style.setProperty('--menu-column-width', `${(entry.target.offsetWidth / 3)}px`)
    }
  }
})

const menuItemResizeObserver = new ResizeObserver((entries) => {
  for (const entry of entries) {
    if (entry.contentBoxSize) {
      entry.target.querySelector('.sub-menu').style.setProperty('--offset-left', `${entry.target.offsetWidth}px`)
    }
  }
})

document.addEventListener("DOMContentLoaded", () => {
  const cabecalho = document.querySelector('header > .container')

  const menuPrincipalNav = document.querySelector('.menu-principal-collapse')

  if (!menuPrincipalNav) return

  menuPrincipalNav.addEventListener('shown.bs.collapse', () => {
    document.body.style.overflow = 'hidden'
  })

  menuPrincipalNav.addEventListener('hidden.bs.collapse', () => {
    document.body.style.overflow = 'auto'
  })

  menuPrincipalNav.style.setProperty('--header-height', `${(cabecalho.offsetHeight)}px`)

  const menuPrincipal = menuPrincipalNav.querySelector('.menu-principal')
  menuPrincipalResizeObserver.observe(menuPrincipal)

  const createNativeIcon = () => {
    const icon = document.createElement('span')
    icon.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6l-6 6" /></svg>'
    return icon.firstElementChild
  }

  const faIcon = window.FontAwesome?.icon({ prefix: 'fas', iconName: 'angle-right' })

  const menuItems = menuPrincipal.querySelectorAll('.menu-item-has-children')

  menuItems.forEach(menuItem => {
    menuItemResizeObserver.observe(menuItem)

    const iconNode = faIcon?.node?.[0]?.cloneNode(true) ?? createNativeIcon()
    if (iconNode) menuItem.append(iconNode)

    menuItem.addEventListener('click', e => {
      if (!e.target.classList.contains('menu-item-has-children') && !e.target.parentElement.classList.contains('menu-item-has-children')) return true

      e.preventDefault()
      e.stopPropagation()

      const childSubmenu = menuItem.querySelector('.sub-menu')
      childSubmenu.classList.toggle('show')

      const submenus = menuItem.parentElement.querySelectorAll('.sub-menu')
      submenus.forEach(submenu => {
        if (submenu != childSubmenu) submenu.classList.remove('show')
      })
    })
  })

  const submenusAncestors = menuPrincipal.querySelectorAll('.current-menu-ancestor > .sub-menu')
  submenusAncestors.forEach(submenu => submenu.classList.add('show'))
})
