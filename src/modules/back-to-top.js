document.addEventListener('DOMContentLoaded', () => {
  const backToTopLink = document.querySelector('.footer__back-to-top')

  if (!backToTopLink) return

  let ticking = false

  const updateBackToTopState = () => {
    ticking = false

    const scrollThreshold = Math.max(240, Math.round(window.innerHeight * 0.35))
    backToTopLink.classList.toggle('is-visible', window.scrollY > scrollThreshold)
  }

  const scheduleBackToTopUpdate = () => {
    if (ticking) return

    ticking = true
    window.requestAnimationFrame(updateBackToTopState)
  }

  updateBackToTopState()

  window.addEventListener('scroll', scheduleBackToTopUpdate, { passive: true })
  window.addEventListener('resize', scheduleBackToTopUpdate)
  window.addEventListener('orientationchange', scheduleBackToTopUpdate)
  window.visualViewport?.addEventListener('resize', scheduleBackToTopUpdate)
})
