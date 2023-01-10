<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
    <?php the_css_blocks(); ?>
    <?php the_field('ah_google_head', 'option'); ?>
    <?php the_field('ah_fb_pixel', 'option'); ?>
</head>
<body <?php body_class() ?> id="top">

    <?php the_field('ah_google_body', 'option'); ?>

    <?php wp_body_open() ?>
        <?php if(is_front_page()) :?>
            <header class="header light">
        <?php endif;?>
        <?php if(!is_front_page()) :?>
            <header class="header">
        <?php endif;?>
        <!-- <div class="container flex_container">
            <div class="flex_container_item left_item">
            <?php 
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
                    <div class="custom-logo-link"><?php
                    if( !empty( $custom_logo_id ) ) {
                        echo wp_get_attachment_image( $custom_logo_id, 'full' );
                    } else {
                        bloginfo('name');
                    } ?>
                    </div><?php
                }
            ?>
            </div>
            <div class="flex_container_item right_item">
                <form action="" class="zip_search">
                    <input type="search" name="" id="" placeholder="Find by ZIP or city">
                    <button type="submit">
                        <img src="<?php echo get_template_directory_uri().'/assets/img/search_ico.svg' ?>" alt="search ico">
                    </button>
                </form>
                <a href="tel:<?php echo get_field('ah_phone_btn_link', 'option') ?>" class="phone">
                    <img src="<?php echo get_template_directory_uri().'/assets/img/phone_ico.svg' ?>" alt="phone ico">
                    <?php echo get_field('ah_phone_btn_number', 'option') ?>
                </a>
                <div class="menu_btn">
                    <span></span>
                </div>
                <div class="menu_sidebar">
                    <div class="menu_sidebar_wrap">
                        <div class="close">
                            <span></span>
                        </div>
                        <div class="menu_sidebar_item">
                            <h3>Menu</h3>
                            <?php
                            wp_nav_menu( [
                                'theme_location'  => 'HeadMenu',
                                'container'       => null,
                                'menu_class'      => 'header_menu_list',
                            ] );
                            ?>
                        </div>
                        <div class="menu_sidebar_item">
                            <a href="tel:<?php echo get_field('ah_phone_btn_link', 'option') ?>" class="btn phone">
                                <img src="<?php echo get_template_directory_uri().'/assets/img/phone_ico.svg' ?>" alt="phone ico">
                                <?php echo get_field('ah_phone_btn_number', 'option') ?>
                            </a>
                            <a href="<?php echo get_field('ah_shop_btn_link', 'option') ?>" class="btn shop_btn">
                                <?php echo get_field('ah_shop_btn_name', 'option') ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="container">
        <nav class="header__menu">
            <ul class="header__menu-list">
                <li class="header__menu-item header__menu-item_multiple">
                    <a href="#" class="header__menu-link">Real Estate</a>
                    <ul class="header__menu-subs">
                        <li class="header__menu-sub">
                            <a href="#" class="header__menu-link">overview</a>
                        </li>
                        <li class="header__menu-sub">
                            <a href="#" class="header__menu-link">portfolio</a>
                        </li>
                        <li class="header__menu-sub">
                            <a href="#" class="header__menu-link">availability</a>
                        </li>
                    </ul>
                </li>
                <li class="header__menu-item">
                    <a href="#" class="header__menu-link">Private Equity</a>
                </li>
                <li class="header__menu-item">
                    <a href="#" class="header__menu-link">Credit</a>
                </li>
            </ul>
            <?php  $logo_id = get_theme_mod( 'custom_logo' );?>
            <?php  $custom_logo_id = get_theme_mod( 'custom_logo' );?>
            <?php if(!is_front_page()) :?>
                <a href="<?php echo get_home_url(); ?>" class="header__logo"><?php
                    if( !empty( $logo_id ) ) {
                        echo wp_get_attachment_image( $logo_id, 'full' );
                    } else {
                        bloginfo('name');
                    } ?>
            <?php endif;?>
            <?php if(is_front_page()) :?>
                <a href="<?php echo get_home_url(); ?>" class="header__logo"><?php
                    if( !empty( $custom_logo_id ) ) {
                        echo wp_get_attachment_image( $custom_logo_id, 'full' );
                    } else {
                        bloginfo('name');
                    } ?>
            <?php endif;?>
            <ul class="header__menu-list">
                <li class="header__menu-item header__menu-item_search">
                    <form action="">
                        <input type="text" class="header__menu-input">
                    </form>
             
                    <a href="#" class="">
                        
                            <img src="@img/header/search_light.svg" alt="logo">
                            
                            <!-- <img src="@img/header/search.svg" alt="logo"> -->
                    </a>
                </li>
                <li class="header__menu-item">
                    <a href="#" class="header__menu-link">Responsibility</a>
                </li>
                <li class="header__menu-item">
                    <a href="#" class="header__menu-link">About</a>
                </li>
                <li class="header__menu-item">
                    <a href="#" class="header__menu-link">Contact</a>
                </li>
            </ul>
        </nav>
    </div>
    </header>
    <main class="main">