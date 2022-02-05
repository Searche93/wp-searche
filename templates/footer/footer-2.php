<?php

use Theme\Theme;
use Theme\ThemeSocials;

?>
<footer class="footer-bg-color color-white">
    <?php if(Theme::get_theme_option('theme_footer_fullwidth')):?>
        <div class="wrapper">
    <?php endif;?>
        <div class="row center-text p-md">
            <?=ThemeSocials::get_theme_socials( 'h3 p-l-sm p-r-sm', 'color-white');?>
        </div>
        <div class="row footer-blocks p-md">
            <div class="col-3 col-6-sm col-12-xs p-l-md p-r-md">
                <?php if(is_active_sidebar('footer-1')) {
                    dynamic_sidebar('footer-1');
                }?>
            </div>
            <div class="col-3 col-6-sm col-12-xs p-l-md p-r-md">
                <?php if(is_active_sidebar('footer-2')) {
                    dynamic_sidebar('footer-2');
                }?>
            </div>
            <div class="col-3 col-6-sm col-12-xs p-l-md p-r-md">
                <?php if(is_active_sidebar('footer-3')) {
                    dynamic_sidebar('footer-3');
                }?>
            </div>
            <div class="col-3 col-6-sm col-12-xs p-l-md p-r-md">
                <?php if(is_active_sidebar('footer-4')) {
                    dynamic_sidebar('footer-4');
                }?>
            </div>
        </div>
        <div class="row copyright fs-small">
            <div class="p-md">
                <p class="p-x-md">
                    <span>&copy; Copyright <?=date('Y');?></span>
                    <?php if(get_yoast_sitemap()) {
                        echo '<span class="p-l-sm p-r-sm"> | </span> <span>'.get_yoast_sitemap('color-white').'</span>';
                    }?>
                </p>
            </div>
        </div>
    <?php if(Theme::get_theme_option('theme_footer_fullwidth')):?>
        </div>
    <?php endif;?>
</footer>