const VARIATION_NOTICIAS = 'ifrs-portal-theme/noticias'

window.wp.domReady( function() {
  const ICON = wp.element.createElement(
    wp.primitives.SVG,
    { xmlns: "http://www.w3.org/2000/svg", viewBox: "0 0 512 512" },
    wp.element.createElement(
      wp.primitives.Path,
      {
        d: "M168 80c-13.3 0-24 10.7-24 24l0 304c0 8.4-1.4 16.5-4.1 24L440 432c13.3 0 24-10.7 24-24l0-304c0-13.3-10.7-24-24-24L168 80zM72 480c-39.8 0-72-32.2-72-72L0 112C0 98.7 10.7 88 24 88s24 10.7 24 24l0 296c0 13.3 10.7 24 24 24s24-10.7 24-24l0-304c0-39.8 32.2-72 72-72l272 0c39.8 0 72 32.2 72 72l0 304c0 39.8-32.2 72-72 72L72 480zM176 136c0-13.3 10.7-24 24-24l96 0c13.3 0 24 10.7 24 24l0 80c0 13.3-10.7 24-24 24l-96 0c-13.3 0-24-10.7-24-24l0-80zm200-24l32 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-32 0c-13.3 0-24-10.7-24-24s10.7-24 24-24zm0 80l32 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-32 0c-13.3 0-24-10.7-24-24s10.7-24 24-24zM200 272l208 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-208 0c-13.3 0-24-10.7-24-24s10.7-24 24-24zm0 80l208 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-208 0c-13.3 0-24-10.7-24-24s10.7-24 24-24z",
      }
    )
  )

  // const homeId = window.wp.data.select('core').getSite().page_for_posts;
  // const homePage = window.wp.data.select('core').getEntityRecord('postType', 'page', homeId);
  // const homeUrl = homePage?.link || '/'; // fallback para '/' caso não encontre

  window.wp.blocks.registerBlockVariation( 'core/query', {
    name: VARIATION_NOTICIAS,
    title: 'Notícias',
    description: 'Lista as notícias, excluindo as que possuem escopo.',
    isActive: ( { namespace, query } ) => {
      return (namespace === VARIATION_NOTICIAS && query.postType === 'post')
    },
    icon: ICON,
    attributes: {
      namespace: VARIATION_NOTICIAS,
      query: {
        perPage: 6,
        pages: 0,
        offset: 0,
        postType: 'post',
        order: 'desc',
        orderBy: 'date',
        author: '',
        search: '',
        exclude: [],
        sticky: '',
        inherit: false,
      },
    },
    scope: [ 'inserter' ],
    innerBlocks: [
      [
        'core/post-template', { 'layout': { type: 'grid', columnCount: 3 } },
        [
          [ 'core/post-featured-image' ],
          [ 'core/post-title', { level: 2, isLink: true } ],
        ],
      ],
      [
        'core/button',
        {
          text: 'Acesse mais Notícias',
          url: '/noticias',
          align: 'center',
          size: 'large',
          className: 'wp-block-button__link',
        },
      ],
    ],
  } )
})
