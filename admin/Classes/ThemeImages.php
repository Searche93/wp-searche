<?php

namespace Searche\Classes;

use WebPConvert\WebPConvert;

class ThemeImages extends Theme
{

    /**
     * Register function called in parent construct
     */
    public static function register()
    {
        add_action('add_attachment', array(static::class, 'add_webp_image'));

        add_shortcode( 'img', array(static::class, 'get_webp_version'));
    }

    /**
     * On upload image add a webp version of that image
     * This function will increase pagespeed
     *
     * @param $attachment_id
     * @throws \WebPConvert\Convert\Exceptions\ConversionFailedException
     */
    public static function add_webp_image( $attachment_id )
    {
        $source = get_attached_file($attachment_id);
        $sourceExtension = '.' . pathinfo($source)['extension'];
        $webpImg = str_replace($sourceExtension, '.webp', $source);
        $options = [];
        WebPConvert::convert($source, $webpImg, $options);
    }

    /**
     * Check if an image exists in a webp format
     *
     * @param $imgSrc
     * @return string
     */
    public static function check_webp_availability($imgSrc): string
    {
        $imgExtension = '.' . pathinfo($imgSrc)['extension'];
        $webpImg = str_replace($imgExtension, '.webp', $imgSrc);
        $file_headers = @get_headers($webpImg);
        return ($file_headers[0] != 'HTTP/1.0 404 Not Found') ? $webpImg : $imgSrc;
    }


    /**
     * Shortcode option for:
     * Check if an image exists in a webp format
     *
     * @param $src
     * @return string
     */
    public static function get_webp_version($src): string
    {
        $imgLink = self::check_webp_availability($src['src']);
        return '<img src="'.$imgLink.'">';
    }


    /**
     * Change image size
     *
     * @param $size
     * @param $percentage
     * @return int
     */
    public static function change_img_size($size, $percentage): int
    {
        return round($size / 100 * $percentage);
    }

}