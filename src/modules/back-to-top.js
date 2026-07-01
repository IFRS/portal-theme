document.addEventListener('DOMContentLoaded', () => {
  const backToTopButton = document.querySelector('.footer__back-to-top')

  if (!backToTopButton) return

  let ticking = false

  const updateBackToTopState = () => {
    ticking = false

    const scrollThreshold = Math.max(240, Math.round(window.innerHeight * 0.35))
    backToTopButton.classList.toggle('is-visible', window.scrollY > scrollThreshold)
  }

  const scheduleBackToTopUpdate = () => {
    if (ticking) return

    ticking = true
    window.requestAnimationFrame(updateBackToTopState)
  }

  updateBackToTopState()

  backToTopButton.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' })
  })

  window.addEventListener('scroll', scheduleBackToTopUpdate, { passive: true })
  window.addEventListener('resize', scheduleBackToTopUpdate)
  window.addEventListener('orientationchange', scheduleBackToTopUpdate)
  window.visualViewport?.addEventListener('resize', scheduleBackToTopUpdate)
})
