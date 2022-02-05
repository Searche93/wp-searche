<?php

use Theme\Theme;
use Theme\ThemeTemplates;

?>
<?php get_header(); ?>
    <?php if(Theme::get_theme_option('theme_header_fullwidth')) {
        require_once(ThemeTemplates::get_theme_header());
    }?>
    <div class="wrapper">
        <div class="site-content bg-white">
            <?php if(!Theme::get_theme_option('theme_header_fullwidth')) {
                require_once(ThemeTemplates::get_theme_header());
            }?>
            <div class="content content-bg-color p-y-xl p-l-md p-r-md overflow-auto">
                <div class="m-b-md">
                    <?=Theme::get_breadcrumbs();?>
                </div>
                <main id="main" class="site-main <?=ThemeTemplates::get_content_position() . ' ' . ThemeTemplates::get_content_width();?>" role="main">
                    <h1 class="p-b-sm"><?=the_title();?></h1>
                    <?=the_content();?>
                </main>
                <?php if(!Theme::get_theme_option('theme_no_sidebar')):?>
                    <aside class="col-3 col-12-sm <?=ThemeTemplates::get_sidebar_position();?>">
                        <?php require_once (ThemeTemplates::get_theme_sidebar());?>
                    </aside>
                <?php endif;?>
            </div>
            <?php if(!Theme::get_theme_option('theme_footer_fullwidth')) {
                require_once(ThemeTemplates::get_theme_footer());
            }?>
        </div>
    </div>
    <?php if(Theme::get_theme_option('theme_footer_fullwidth')) {
        require_once(ThemeTemplates::get_theme_footer());
    }?>
<?php get_footer(); ?>