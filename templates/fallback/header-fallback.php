<?php
/*
 * DO NOT DELETE THIS FILE
 *
 * If there is no header file found, this file will be called.
 */

use Theme\Theme;

?>
<header>
    <div class="row d-flex">
        <div class="head-logo col-2">
            <?php
            $imageId = Theme::get_theme_option('theme_logo');
            if( $image = wp_get_attachment_image_src( $imageId, 'full', false ) ) {
                echo "<img alt='logo' class='logo-img' width='1280' height='750' src='$image[0]'>";
            }?>
        </div>
        <div class="col-10 main-menu">
            <?php Theme::get_theme_menu(
                    'main-menu',
                false,
                'pull-right',
                '',
                'p-sm d-inline-block pull-left',
            );?>
        </div>
    </div>
</header>