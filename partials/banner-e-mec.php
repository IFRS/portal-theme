<?php
  $banner_enabled = cmb2_get_option( 'e_mec_options', 'e_mec_enable' );
  $banner_img = wp_get_attachment_image( cmb2_get_option( 'e_mec_options', 'e_mec_img_id' ), 'full', false, array( 'class' => 'd-block lazyload img-fluid mx-auto' ) );
  $banner_url = cmb2_get_option( 'e_mec_options', 'e_mec_url' );
?>
<?php if (!empty($banner_enabled) && !empty($banner_img)) : ?>
  <?php if (!empty($banner_url)) : ?>
    <a href="<?php echo $banner_url ?>" target="_blank" class="d-block" rel="noopener" data-toggle="tooltip" data-placement="top" title="Consulte o cadastro do IFRS no e-MEC">
  <?php endif; ?>
    <?php echo $banner_img; ?>
  <?php if (!empty($banner_url)) : ?>
    </a>
  <?php endif; ?>
<?php endif; ?>
