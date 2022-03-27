<?php

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
                    <h1 class="p-b-sm">Zoekresultaten</h1>
                    <div class="row">
                        <?php if(have_posts()) {
                            $count = 0;
                            while(have_posts()) {
                                the_post();
                                ?>
                                <div class="col-6 p-md <?=($count%2) ? 'p-r-none' : 'p-l-none';?>">
                                    <h3><?php the_title();?></h3>
                                    <p><?php the_excerpt();?></p>
                                    <p>
                                        <a class="p-y-sm p-l-md p-r-md bg-primary hover-bg-secondary transition color-white"
                                           href="<?php the_permalink();?>">Lees meer</a>
                                    </p>
                                </div>
                                <?=($count%2) ? '<div class="clear"></div>' : '' ;?>
                                <?php $count++;?>
                            <?php }
                        }?>
                    </div>
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