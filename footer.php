    </main>

    <?php
    $loc_cat_args = [
        'taxonomy'     => 'location-categories',
        'type'         => 'location',
        'orderby'      => 'name',
        'order'        => 'ASC',
        'hide_empty'   => 1,
        'exclude'      => '',
        'include'      => '',
        'number'       => 0,
        'pad_counts'   => false,
    ];
    $loc_categories = get_categories($loc_cat_args);
    $query = new WP_Query;
    $locations = $query->query('post_type=location');
    ?>

    <footer class="footer_top">
        <div class="container flex__container">
            <div class="footer_top_info"><?php
                $custom_logo_id = get_theme_mod( 'custom_logo' );
    
                if(! is_front_page()) { ?>
                    <a href="<?php echo get_home_url(); ?>" class="custom-logo-link"><?php
                    if( !empty( $custom_logo_id ) ) {
                        echo wp_get_attachment_image( $custom_logo_id, 'full' );
                    } else {
                        bloginfo('name');
                    } ?>
                    </a><?php
                } else { ?>
                    <a href="#top" class="custom-logo-link"><?php
                    if( !empty( $custom_logo_id ) ) {
                        echo wp_get_attachment_image( $custom_logo_id, 'full' );
                    } else {
                        bloginfo('name');
                    } ?>
                    </a><?php
                }
                ?>
                <div class="excerpt"><?php the_field('ah_footer_excerpt', 'option') ?></div>
                <a href="#" class="btn">Book now</a>
            </div>
            <div class="footer_top_states">
                <?php foreach ( $loc_categories as $item ) :
                    $cat_id = $item->term_id; ?>
                    <div class="footer_top_states_item">
                        <h3 class="state_name"><?php echo $item->name ?></h3>
                        <ul class="footer_top_loc_list">
                            <?php
                            $args = [
                                'post_type' => 'location',
                                'tax_query' => [
                                    [
                                        'taxonomy' => 'location-categories',
                                        'field' => 'id',
                                        'terms' => $cat_id,
                                    ]
                                ],
                            ];
                            $query = new WP_Query;
                            $locations = $query->query($args);
                            foreach( $locations as $loc ) : ?>
                                <li class="footer_top_loc_list_item">
                                    <a href="<?php the_permalink( $loc->ID ) ?>" class="loc_link"><?php echo $loc->post_title ?></a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="footer_top_contacts">
                <h3>Contact Us</h3>
                <?php
                wp_nav_menu( [
                    'theme_location'  => 'FootContMenu',
                    'container'       => null,
                    'menu_class'      => 'footer_top_contacts_menu',
                ] );
                ?>
            </div>
        </div>
    </footer>
    <footer class="footer_bottom">
        <div class="container flex__container">
            <div class="footer_bottom_copy">
                <p>Copyright &copy; <?php echo date('Y') ?> | <?php echo get_field('ah_footer_copy_text', 'option') ?></p>
            </div>
            <div class="footer_bottom_menu">
                <?php
                wp_nav_menu( [
                    'theme_location'  => 'footer_bottom_menu',
                    'container'       => null,
                    'menu_class'      => 'footer_bottom_menu_list',
                ] );
                ?>
            </div>
            <div class="footer_bottom_devs">
                <p>Designed and maintained by</p><?php
                $img       = wp_get_attachment_image_src( get_field('ah_footer_devs_logo', 'option'), 'full' );
                $image_alt = get_post_meta( get_field('ah_footer_devs_logo', 'option'), '_wp_attachment_image_alt', true );
                if( isset( $img[0] ) && $img[0] ){ ?>
                <img src="<?php echo $img[0] ?>" alt="<?php echo $image_alt ?>">
                <?php } ?>
            </div>
        </div>
    </footer>

    <?php wp_footer() ?>
</body>
</html>