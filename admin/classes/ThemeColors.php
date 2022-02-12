<?php


namespace Searche\Classes;

class ThemeColors extends Theme
{

    CONST FB_COLOR_WHITE = '#FFFFFF';
    CONST FB_COLOR_BLACK = '#000000';

    /**
     * Get primary color
     *
     * @return string
     */
    public static function get_primary_color(): string
    {
        return (Theme::get_theme_option('theme_primary_color')) ? Theme::get_theme_option('theme_primary_color') : ThemeColors::FB_COLOR_BLACK;
    }


    /**
     * Get the secondary color
     *
     * @return string
     */
    public static function get_secondary_color(): string
    {
        return (Theme::get_theme_option('theme_secondary_color')) ? Theme::get_theme_option('theme_secondary_color') : ThemeColors::FB_COLOR_BLACK;
    }


    /**
     * Get tertiary color
     *
     * @return string
     */
    public static function get_tertiary_color(): string
    {
        return (Theme::get_theme_option('theme_tertiary_color')) ? Theme::get_theme_option('theme_tertiary_color') : ThemeColors::FB_COLOR_BLACK;
    }


    /**
     * Get extra color
     *
     * @return string
     */
    public static function get_extra_color(): string
    {
        return (Theme::get_theme_option('theme_extra_color')) ? Theme::get_theme_option('theme_extra_color') : ThemeColors::FB_COLOR_BLACK;
    }


    /**
     * Get body background color
     *
     * @return string
     */
    public static function get_body_bg_color(): string
    {
        return (Theme::get_theme_option('theme_body_bg_color')) ? Theme::get_theme_option('theme_body_bg_color') : ThemeColors::FB_COLOR_WHITE;
    }


    /**
     * Get header background color
     *
     * @return string
     */
    public static function get_header_bg_color(): string
    {
        return (Theme::get_theme_option('theme_header_bg_color')) ? Theme::get_theme_option('theme_header_bg_color') : ThemeColors::FB_COLOR_WHITE;
    }


    /**
     * Get content background color
     *
     * @return string
     */
    public static function get_content_bg_color(): string
    {
        return (Theme::get_theme_option('theme_content_bg_color')) ? Theme::get_theme_option('theme_content_bg_color') : ThemeColors::FB_COLOR_WHITE;
    }


    /**
     * Get footer background color
     *
     * @return string
     */
    public static function get_footer_bg_color(): string
    {
        return (Theme::get_theme_option('theme_footer_bg_color')) ? Theme::get_theme_option('theme_footer_bg_color') : ThemeColors::FB_COLOR_WHITE;
    }

}