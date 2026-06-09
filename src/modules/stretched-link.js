const STRETCHED_LINK_SELECTORS = [
  '.portal-cta-banner .wp-block-heading a',
  '.noticias-destaque .wp-block-post-title a',
];

function isStretchedLinkTarget(element) {
  return STRETCHED_LINK_SELECTORS.some((selector) => element.matches(selector));
}

function applyStretchedLinkClass(root = document) {
  root.querySelectorAll(STRETCHED_LINK_SELECTORS.join(', ')).forEach((link) => {
    link.classList.add('stretched-link');
  });
}

function watchForHeadingLinkChanges() {
  const observer = new MutationObserver((mutations) => {
    mutations.forEach((mutation) => {
      mutation.addedNodes.forEach((node) => {
        if (!(node instanceof Element)) {
          return;
        }

        if (isStretchedLinkTarget(node)) {
          node.classList.add('stretched-link');
          return;
        }

        applyStretchedLinkClass(node);
      });
    });
  });

  observer.observe(document.body, { childList: true, subtree: true });
}

function initCtaBannerStretchedLink() {
  if (window.__portalCtaBannerStretchedLinkInitialized) {
    return;
  }

  window.__portalCtaBannerStretchedLinkInitialized = true;

  applyStretchedLinkClass();
  watchForHeadingLinkChanges();
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initCtaBannerStretchedLink, { once: true });
} else {
  initCtaBannerStretchedLink();
}
