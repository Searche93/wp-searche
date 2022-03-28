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
        .wrapper {width: <?=ThemeTemplates::get_wrapper_width();?>;}

        .body-bg-color {background-color: <?=ThemeColors::get_body_bg_color();?>;}
        .header-bg-color {background-color: <?=ThemeColors::get_header_bg_color();?>;}
        .content-bg-color {background-color: <?=ThemeColors::get_content_bg_color();?>;}
        .footer-bg-color {background-color: <?=ThemeColors::get_footer_bg_color();?>;}

        h1, h2, h3, h4, h5, h6 {color: <?=ThemeColors::get_primary_color();?>;}

        .color-primary, .color-primary *{color: <?=ThemeColors::get_primary_color();?>;}
        .color-secondary, .color-secondary *{color: <?=ThemeColors::get_secondary_color();?>;}
        .color-tertiary, .color-tertiary *{color: <?=ThemeColors::get_tertiary_color();?>;}
        .color-extra, .color-extra *{color: <?=ThemeColors::get_extra_color();?>;}

        .bg-primary{background-color: <?=ThemeColors::get_primary_color();?>;}
        .bg-secondary{background-color: <?=ThemeColors::get_secondary_color();?>;}
        .bg-tertiary{background-color: <?=ThemeColors::get_tertiary_color();?>;}
        .bg-extra{background-color: <?=ThemeColors::get_extra_color();?>;}

        .hover-primary:hover{color: <?=ThemeColors::get_primary_color();?>;}
        .hover-secondary:hover{color: <?=ThemeColors::get_secondary_color();?>;}
        .hover-tertiary:hover{color: <?=ThemeColors::get_tertiary_color();?>;}
        .hover-extra:hover{color: <?=ThemeColors::get_extra_color();?>;}

        .hover-bg-primary:hover{background-color: <?=ThemeColors::get_primary_color();?>;}
        .hover-bg-secondary:hover{background-color: <?=ThemeColors::get_secondary_color();?>;}
        .hover-bg-tertiary:hover{background-color: <?=ThemeColors::get_tertiary_color();?>;}
        .hover-bg-extra:hover{background-color: <?=ThemeColors::get_extra_color();?>;}
    </style>
    <link rel="stylesheet" href="<?=get_stylesheet_uri();?>">
</head>

<body class="body-bg-color">

<?php wp_body_open(); ?>
