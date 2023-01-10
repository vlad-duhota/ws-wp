<div id="post-<?= get_the_ID() ?>" <?php post_class('ah_listing_box') ?>>
  <div class="ah_listing_img"><?php
      $img         = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail_735x354' );
      $image_alt   = get_post_meta($img, '_wp_attachment_image_alt', true);
      $image_alt   = ( $image_alt ? $image_alt : get_the_title() );
      $src         = ( isset( $img[0] ) ?$img[0] :ah_slice_http_path . 'img/noimage.jpg' ); ?>
      <a href="<?php the_permalink() ?>">
        <img src="<?php echo( $img[0] ?? esc_url( ah_slice_http_path ) . 'img/noimage.jpg' ) ?>" alt="<?php echo esc_attr( $image_alt ) ?>" width="735" height="354">
      </a>
  </div>
  <div class="ah_listing_item">
      <div class="ah_listing_item_wrap">
        <div class="post_tags">
          <?php echo the_tags('', '') ?>
        </div>
          <div class="post_details">
            <p class="post_date"><?php echo get_the_date( 'd.m.Y' ) ?></p>
            <h2>
              <a href="<?php the_permalink() ?>">
                <?php the_title() ?>
              </a>
            </h2>
          </div>
        <a href="<?php echo the_permalink() ?>" class="learn_more"><span>Learn more </span><img src="<?php echo get_template_directory_uri() ?>/assets/img/learn_more.svg" alt=""></a>
      </div>
  </div>
</div>

