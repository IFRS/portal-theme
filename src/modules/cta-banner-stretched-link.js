const CTA_HEADING_LINK_SELECTOR = '.portal-cta-banner .wp-block-heading a';

function applyStretchedLinkClass(root = document) {
  root.querySelectorAll(CTA_HEADING_LINK_SELECTOR).forEach((link) => {
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

        if (node.matches(CTA_HEADING_LINK_SELECTOR)) {
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
