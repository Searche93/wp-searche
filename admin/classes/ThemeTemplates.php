<?php

namespace Theme;

class ThemeTemplates extends Theme
{

    CONST FULLWIDTH = '100%';

    /**
     * Get the theme header
     *
     * @return string
     */
    public static function get_theme_header(): string
    {
        $fallback = get_template_directory() . '/templates/fallback/header-fallback.php';
        $file = (Theme::get_theme_option('theme_header') !== '') ? self::get_theme_template_part('header') : $fallback;
        return (file_exists($file) ? $file : $fallback);
    }


    /**
     * Check if header is fullwidth
     *
     * @return bool
     */
    public static function fullwidth_header(): bool
    {
        return (bool)ThemeTemplates::get_theme_option('theme_header_fullwidth');
    }


    /**
     * Get the theme footer
     *
     * @return string
     */
    public static function get_theme_footer(): string
    {
        $fallback = get_template_directory() . '/templates/fallback/footer-fallback.php';
        $file = (Theme::get_theme_option('theme_footer') !== '') ? self::get_theme_template_part('footer') : $fallback;
        return (file_exists($file) ? $file : $fallback);
    }


    /**
     * Check if footer is fullwidth
     *
     * @return bool
     */
    public static function fullwidth_footer(): bool
    {
        return (bool)ThemeTemplates::get_theme_option('theme_footer_fullwidth');
    }


    /**
     * Get the theme sidebar
     *
     * @return string
     */
    public static function get_theme_sidebar(): string
    {
        $fallback = get_template_directory() . '/templates/fallback/sidebar.php';
        $file = get_template_directory() . '/templates/sidebar/sidebar.php';
        return (file_exists($file) ? $file : $fallback);
    }


    /**
     * Get sidebar position
     *
     * @return string
     */
    public static function get_sidebar_position(): string
    {
        return (Theme::get_theme_option('theme_sidebar') == 'left') ? 'pull-left' : 'pull-right';
    }


    /**
     * Get sidebar status
     *
     * @return bool
     */
    public static function sidebar_disabled(): bool
    {
        return (bool)ThemeTemplates::get_theme_option('theme_no_sidebar');
    }


    /**
     * Get content width
     *
     * @return string
     */
    public static function get_content_width(): string
    {
        return (Theme::get_theme_option('theme_no_sidebar')) ? 'col-12' : 'col-9 col-12-sm';
    }


    /**
     * Get content position
     *
     * @return string
     */
    public static function get_content_position(): string
    {
        $contentPosition = (Theme::get_theme_option('theme_sidebar') == 'left') ? 'pull-right' : 'pull-left';
        return (Theme::get_theme_option('theme_no_sidebar')) ? '' : $contentPosition;
    }


    /**
     * Get wrapper width
     *
     * @return string
     */
    public static function get_wrapper_width(): string
    {
        return (Theme::get_theme_option('theme_wrapper_width')) ? Theme::get_theme_option('theme_wrapper_width') . 'px' : ThemeTemplates::FULLWIDTH;
    }


    /**
     * Return a single template file
     *
     * @param string $part
     * @return string
     */
    public static function get_theme_template_part(string $part): string
    {
        return (get_template_directory() . '/templates/' . $part . '/' . Theme::get_theme_option('theme_' . $part));
    }


    /**
     * Return an array of template files
     *
     * @param string $folder
     * @param bool $fileNames
     * @return array|false
     */
    public static function get_theme_template_files(string $folder, bool $fileNames = false)
    {
        $files = scandir(get_template_directory() . '/templates/' . $folder);
        if($fileNames == true) {
            $files = str_replace(['-', '.php'], [' ', ''], $files);
        }
        return array_filter(
            $files,
            function($value) use ($folder){
                return preg_match('/' . $folder . '/i', $value);
            }
        );
    }


    /**
     * Return an array of clean template filenames
     *
     * @param string $folder
     * @return array|false
     */
    public static function get_theme_template_filenames(string $folder)
    {
        return self::get_theme_template_files($folder, true);
    }


    /**
     * Return an array of template files and clean filenames
     *
     * @param string $folder
     * @return array|false
     */
    public static function get_template_files_and_names(string $folder)
    {
        return array_combine(self::get_theme_template_files($folder), self::get_theme_template_filenames($folder));
    }

}