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
  const cabecalho = document.querySelector('header')

  const menuPrincipalNav = document.querySelector('.menu-principal-collapse')

  menuPrincipalNav.addEventListener('shown.bs.collapse', () => {
    document.body.style.overflow = 'hidden'
  })

  menuPrincipalNav.addEventListener('hidden.bs.collapse', () => {
    document.body.style.overflow = 'auto'
  })

  menuPrincipalNav.style.setProperty('--header-height', `${(cabecalho.offsetHeight)}px`)

  const menuPrincipal = menuPrincipalNav.querySelector('.menu-principal')
  menuPrincipalResizeObserver.observe(menuPrincipal)

  const icon = window.FontAwesome.icon({ prefix: 'fas', iconName: 'angle-right' })

  const menuItems = menuPrincipal.querySelectorAll('.menu-item-has-children')

  // const submenus = menuPrincipal.querySelectorAll('.sub-menu')

  menuItems.forEach(menuItem => {
    menuItemResizeObserver.observe(menuItem)
    menuItem.append(...icon.node)
    menuItem.addEventListener('click', e => {
      if (e.target.tagName === 'A') return true

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
