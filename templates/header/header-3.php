<?php

use Searche\Classes\Theme;

?>
<header id="header-3" class="header-bg-color">
    <div class="row d-flex flex-dir-col-xs">
        <div class="col-2 col-12-xs f-grow-1">
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
        <div class="col-10 col-12-xs f-grow-1 pos-relative">
            <?=Theme::get_theme_menu(
                'main-menu',
                true,
                'main-menu align-self-flex-end overflow-auto bg-tertiary fullwidth pos-absolute bottom-0',
                'pull-left hover-bg-secondary transition',
                'p-y-md p-l-md p-r-md d-inline-block pull-left color-white hover-tertiary transition'
            );?>
        </div>
    </div>
    <?php if(!empty(Theme::get_theme_option('theme_header_img'))):?>
        <div class="row">
            <div class="head-logo">
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
</header>