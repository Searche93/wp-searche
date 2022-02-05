<?php

use Theme\Theme;

?>
<header id="header-2" class="header-bg-color">
    <div class="row d-flex">
        <?php if(Theme::get_theme_option('theme_header_fullwidth')):?>
            <div class="wrapper d-flex">
        <?php endif;?>
            <div class="col-2 col-3-xs p-r-md f-grow-1">
                <?php if(!empty(Theme::get_theme_option('theme_logo'))):?>
                    <div class="row">
                        <div class="head-logo">
                            <?php
                            $imageId = esc_attr(get_option('theme_logo'));
                            if( $image = wp_get_attachment_image_src( $imageId, 'full', false ) ) {
                                echo "<img class='fullwidth v-align-middle' 
                        alt='logo ".Theme::get_theme_option('theme_logo')."' 
                        width='$image[1]' 
                        height='$image[2]' 
                        src='$image[0]'>";
                            }?>
                        </div>
                    </div>
                <?php endif;?>
            </div>
            <div class="col-10 col-9-xs p-l-md pos-relative f-grow-1">
                <div class="contact-bar pull-right p-r-md p-t-sm">
                    <p class="fs-small color-dark-grey p-sm">
                        <span class="p-r-sm">
                            <i class="fa fa-envelope"></i>
                            <?=Theme::get_theme_option('theme_company_email');?>
                        </span>
                        <span class="p-l-sm">
                        <i class="fa fa-phone"></i>
                            <?=Theme::get_theme_option('theme_company_phone');?>
                        </span>
                    </p>
                </div>
                <div class="col-8 pull-right p-r-md pos-absolute right-0 bottom-md pos-relative-xs bottom-init-xs">
                    <?php get_search_form(); ?>
                </div>
            </div>
        <?php if(Theme::get_theme_option('theme_header_fullwidth')):?>
            </div>
        <?php endif;?>
    </div>
    <div class="row">
        <?=Theme::get_theme_menu(
            'main-menu',
            true,
            'main-menu align-self-flex-end overflow-auto bg-tertiary',
            'pull-left hover-bg-secondary transition',
            'p-y-md p-l-md p-r-md d-inline-block pull-left color-white hover-tertiary transition'
        );?>
    </div>
</header>