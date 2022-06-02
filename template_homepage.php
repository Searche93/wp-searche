<?php
/*
 * Template name: Homepage
 */

use Searche\Classes\Theme;
use Searche\Classes\ThemeTemplates;

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
                <main id="main" class="site-main col-12" role="main">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <h1 class="p-b-sm"><?=the_title();?></h1>
                        <?=the_content();?>
                    <?php endwhile; else : ?>
                        <p><?php esc_html_e( 'No post founds' ); ?></p>
                    <?php endif; ?>
                </main>
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