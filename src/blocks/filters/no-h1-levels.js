const HEADING_BLOCKS = [
  'core/heading',
  'core/comments-title',
  'core/post-title',
  'core/query-title',
  'core/site-tagline',
  'core/site-title',
  'core/term-name',
]

const isHeadingLikeBlock = ( blockName ) => HEADING_BLOCKS.includes( blockName )

const sanitizeLevelOptions = ( levelOptions ) => {
  if ( !Array.isArray( levelOptions ) ) {
    return levelOptions
  }

  return levelOptions.filter( ( level ) => Number( level ) !== 1 )
}

const sanitizeVariations = ( variations ) => {
  if ( !Array.isArray( variations ) ) {
    return variations
  }

  return variations.filter( ( variation ) => {
    const level = Number( variation?.attributes?.level )
    const variationName = String( variation?.name || '' ).toLowerCase()

    if ( level === 1 ) {
      return false
    }

    return variationName !== 'h1' && variationName !== 'heading-h1'
  } )
}

window.wp.hooks.addFilter(
  'blocks.registerBlockType',
  'portal/no-h1-levels/register-block-type',
  ( settings, blockName ) => {
    if ( !isHeadingLikeBlock( blockName ) ) {
      return settings
    }

    const attributes = { ...( settings.attributes || {} ) }

    if ( attributes.levelOptions ) {
      attributes.levelOptions = {
        ...attributes.levelOptions,
        default: sanitizeLevelOptions( attributes.levelOptions.default ),
      }
    }

    return {
      ...settings,
      attributes,
      variations: sanitizeVariations( settings.variations ),
    }
  }
)

window.wp.hooks.addFilter(
  'blocks.switchToBlockType.transformedBlock',
  'portal/no-h1-levels/switch-transform',
  ( transformedBlock ) => {
    if ( !transformedBlock || !isHeadingLikeBlock( transformedBlock.name ) ) {
      return transformedBlock
    }

    if ( Number( transformedBlock.attributes?.level ) !== 1 ) {
      return transformedBlock
    }

    return window.wp.blocks.createBlock(
      transformedBlock.name,
      {
        ...transformedBlock.attributes,
        level: 2,
      },
      transformedBlock.innerBlocks
    )
  }
)

window.wp.domReady( () => {
  const { getBlockVariations, unregisterBlockVariation, getBlockTypes, unregisterBlockType } = window.wp.blocks

  // Remove any H1 variation exposed by the current WordPress/Gutenberg version.
  HEADING_BLOCKS.forEach( ( blockName ) => {
    const variations = getBlockVariations( blockName ) || []

    variations.forEach( ( variation ) => {
      const level = Number( variation?.attributes?.level )
      const variationName = String( variation?.name || '' ).toLowerCase()

      if ( level === 1 || variationName === 'h1' || variationName === 'heading-h1' ) {
        unregisterBlockVariation( blockName, variation.name )
      }
    } )
  } )

  // WordPress 7+ may expose level-specific heading blocks in some editor contexts.
  ;( getBlockTypes() || [] ).forEach( ( blockType ) => {
    const name = String( blockType?.name || '' ).toLowerCase()

    if ( name === 'core/heading' ) {
      return
    }

    if ( !name.startsWith( 'core/heading' ) ) {
      return
    }

    if ( name.includes( 'h1' ) || name.endsWith( '-1' ) || name.includes( 'level-1' ) ) {
      unregisterBlockType( blockType.name )
    }
  } )
} )
