window.wp.domReady( () => {
  window.wp.blocks.registerBlockVariation( 'core/cover', {
    name: 'CTA Banner',
    title: 'CTA Banner',
    description: 'Banner Call-to-action',
    scope: [ 'inserter' ],
    isDefault: false,
    isActive: ( blockAttributes, variationAttributes ) => blockAttributes.className === variationAttributes.className,
    attributes : {
      className: 'portal-cta-banner',
      contentPosition: 'bottom center',
      dimRatio: 20,
      minHeight: 50,
      minHeightUnit: 'dvh',
      isUserOverlayColor: true,
      overlayColor: 'dark',
      style: {
        shadow: 'var:preset|shadow|natural',
      },
      layout: {
        type: 'constrained',
      },
      elements: {
        heading: {
          color: {
            text: 'var:preset|color|white',
          },
        },
        link: {
          className: 'stretched-link',
          color: {
            text: 'var:preset|color|white',
          },
          typography: {
            textDecoration: 'none',
          },
        },
      },
    },
  })
})
