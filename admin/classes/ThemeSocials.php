<?php

namespace Theme;

class ThemeSocials extends Theme
{

    public static $socialPlatforms = [
        'facebook',
        'instagram',
        'linkedin',
        'pinterest',
    ];


    /**
     * Get social platforms
     *
     * @return array
     */
    public static function get_social_platforms(): array
    {
        return (array)self::$socialPlatforms;
    }


    /**
     * Return social icons and links
     *
     * @param string $iconClasses
     * @param string $linkClasses
     * @return string
     */
    public static function get_theme_socials(string $iconClasses = '', string $linkClasses = ''): string
    {
        $result = '<div class="social-icons">';
        foreach (self::get_social_platforms() as $social) {
            if(Theme::get_theme_option('theme_'.$social)) {
                $icon = '<i class="fab fa-'.$social.' '.$iconClasses.'"></i>';
                $optionResult = Theme::get_theme_option('theme_'.$social);
                $url = (strpos($optionResult, 'http') === 0) ? $optionResult : 'https://'.$optionResult;
                $result .= '<a class="social-icon '.$linkClasses.'" href="'.$url.'" target="_blank">'.$icon.'</a>';
            }
        }
        $result .= '</div>';
        return $result;
    }

}