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
                    <div class="center-text">
                        <h1>404</h1>
                        <h3>Page not found.</h3>
                        <div class="row m-t-md">
                            <div class="col-6 pull-init center">
                                <?php get_search_form(); ?>
                            </div>
                        </div>
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