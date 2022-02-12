<?php

use Searche\Classes\Theme;

?>
<header id="header-1" class="header-bg-color">
    <div class="row">
        <div class="topbar overflow-auto bg-dark-grey p-x-md p-t-sm p-b-sm">
            <?php if(Theme::get_theme_option('theme_header_fullwidth')):?>
                <div class="wrapper">
            <?php endif;?>
                <div class="contact-bar pull-left col-12-xs">
                    <p class="fs-small color-white p-sm">
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
                <?=Theme::get_theme_menu(
                        'extra-menu',
                        false,
                        'top-menu pull-right col-12-xs d-inline-block d-none-sm',
                        'p-sm d-inline-block pull-left',
                        'color-extra fs-small'
                );?>
            <?php if(Theme::get_theme_option('theme_header_fullwidth')):?>
                </div>
            <?php endif;?>
        </div>
    </div>
    <?php if(!empty(Theme::get_theme_option('theme_header_img'))):?>
        <div class="row">
            <div class="head-img">
                <?php
                $imageId = esc_attr(get_option('theme_header_img'));
                if( $image = wp_get_attachment_image_src( $imageId, 'full', false ) ) {
                    echo "<img class='fullwidth v-align-middle' 
                    alt='header image ".Theme::get_theme_option('theme_company_name')."' 
                    width='$image[1]' 
                    height='$image[2]' 
                    src='$image[0]'>";
                }?>
            </div>
        </div>
    <?php endif;?>
    <div class="row">
        <div id="toggle-menu" class="d-none d-block-sm pos-absolute right-md top-md">
            <span id="open-menu"><i class="fa fa-bars h3 color-white"></i></span>
            <span id="close-menu"><i class="fa fa-close h3 color-white"></i></span>
        </div>
        <?=Theme::get_theme_menu(
            'main-menu',
            true,
            'align-self-flex-end overflow-auto bg-tertiary',
            'pull-left hover-bg-secondary transition',
            'p-y-md p-l-md p-r-md d-inline-block pull-left color-white hover-tertiary transition'
        );?>
    </div>
</header>