<?php

use Searche\Classes\ThemeTemplates;
use Searche\Classes\ThemeColors;

$favIconId = ThemeTemplates::get_theme_option('theme_favicon');

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php if($favicon = wp_get_attachment_image_src($favIconId)) {
        echo '<link title="Favicon" href="'.$favicon[0].'" rel="shortcut icon" />';
    };?>
    <?php wp_head(); ?>
    <style>
        :root {
            --primary-color: <?=ThemeColors::get_primary_color();?>;
            --secondary-color: <?=ThemeColors::get_secondary_color();?>;
            --tertiary-color: <?=ThemeColors::get_tertiary_color();?>;
            --extra-color: <?=ThemeColors::get_extra_color();?>;
            --body-bg-color: <?=ThemeColors::get_body_bg_color();?>;
            --header-bg-color: <?=ThemeColors::get_header_bg_color();?>;
            --content-bg-color: <?=ThemeColors::get_content_bg_color();?>;
            --footer-bg-color: <?=ThemeColors::get_footer_bg_color();?>;
        }
        .wrapper {width: <?=ThemeTemplates::get_wrapper_width();?>;}
    </style>
    <link rel="stylesheet" href="<?=get_stylesheet_uri();?>">
</head>

<body class="body-bg-color">

<?php wp_body_open(); ?>
