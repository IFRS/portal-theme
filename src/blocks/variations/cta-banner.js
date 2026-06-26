window.wp.domReady( () => {
  window.wp.blocks.registerBlockVariation( 'core/cover', {
    name: 'cta-banner',
    title: 'CTA Banner',
    description: 'Banner Call-to-Action',
    scope: [ 'inserter' ],
    isDefault: false,
    isActive: [ 'className' ],
    attributes : {
      className: 'portal-cta-banner',
      contentPosition: 'bottom center',
      allowedBlocks: [ 'core/heading' ],
      templateLock: 'all',
      dimRatio: 90,
      isUserOverlayColor: true,
      gradient:'banner-dark-vertical',
      style: {
        shadow: 'var:preset|shadow|normal',
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
        paragraph: {
          color: {
            text: 'var:preset|color|white',
          },
        },
      },
    },
    innerBlocks: [
      [
        'core/heading', {
          level: 2,
          placeholder: 'Adicione um título...',
          textAlign: 'center',
          className: 'has-text-align-center',
          style: {
            typography: {
              textAlign: 'center',
            },
          },
        }
      ],
    ]
  })
})
