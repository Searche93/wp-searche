<?php

namespace Searche\Classes;

class Theme
{

    public array $themeSettings = [
        // General
        'theme_logo',
        'theme_header_img',
        'theme_favicon',
        'theme_company_name',
        'theme_company_address',
        'theme_company_zip',
        'theme_company_email',
        'theme_company_phone',
        // Colors
        'theme_primary_color',
        'theme_secondary_color',
        'theme_tertiary_color',
        'theme_body_bg_color',
        'theme_header_bg_color',
        'theme_content_bg_color',
        'theme_footer_bg_color',
        'theme_extra_color',
        // Templates
        'theme_header',
        'theme_header_fullwidth',
        'theme_footer',
        'theme_footer_fullwidth',
        'theme_sidebar',
        'theme_no_sidebar',
        'theme_wrapper_width',
        // Social
        'theme_whatsapp',
        'theme_facebook',
        'theme_instagram',
        'theme_linkedin',
        'theme_pinterest',
    ];

    /**
     * Theme constructor
     */
    public function __construct() {
        add_action('admin_init', array($this, 'create_update_theme_settings'));
        add_action('admin_menu', array($this, 'theme_options_menu'));

        add_action('admin_enqueue_scripts', array($this, 'add_admin_style'));
        add_action('admin_enqueue_scripts', array($this, 'add_admin_scripts'));

        add_shortcode( 'contact-buttons', array($this, 'contact_buttons'));

        ThemeImages::register();
    }

    /**
     * Get theme settings
     *
     * @return array
     */
    public function get_theme_settings(): array {
        return $this->themeSettings;
    }

    /**
     * Create update theme settings
     */
    public function create_update_theme_settings() {
        foreach ($this->get_theme_settings() as $themeSetting) {
            register_setting( 'theme-settings-group', $themeSetting );
        }
    }

    /**
     * Add admin style css
     */
    public function add_admin_style() {
        wp_enqueue_style('admin-styles', get_template_directory_uri().'/admin/css/admin.css');
    }

    /**
     * Add admin script js
     */
    public function add_admin_scripts() {
        if ( ! did_action( 'wp_enqueue_media' ) ) {
            wp_enqueue_media();
        }
        wp_enqueue_script('admin-scripts', get_template_directory_uri().'/admin/js/admin.js');
    }

    /**
     * Add theme options menu item
     */
    public function theme_options_menu() {
        add_menu_page(
            __( 'Theme options', 'wp-searche' ),
            __( 'Theme options', 'wp-searche' ),
            'manage_options',
            'wp-searche-options',
            array($this, 'theme_options_page'),
            'dashicons-admin-generic',
            3
        );
    }

    /**
     * Add options page
     */
    public function theme_options_page() {
        include(get_template_directory() . '/admin/theme-options.php');
    }

    /**
     * Return a theme option value
     *
     * @param string $option
     * @return string|void
     */
    public static function get_theme_option(string $option) {
        return esc_attr(get_option($option));
    }

    /**
     * Get theme menu
     *
     * @param string $menuName
     * @param bool $wrapper
     * @param string $navClasses
     * @param string $listItemClasses
     * @param string $linkClasses
     * @return string
     */
    public static function get_theme_menu(string $menuName, bool $wrapper = false, string $navClasses = '', string $listItemClasses = '', string $linkClasses = ''): string {
        $menu = self::build_menu($menuName);
        if(!$menu) {
            return self::return_error('Menu with name <strong>'.$menuName.'</strong> not found.');
        }

        $menuList = '<nav id="menu-' . $menuName . '" class="menu '.$navClasses.'"><ul>';
        if($wrapper) {
            $menuList .= '<div class="wrapper">';
        }
        foreach ($menu as $item) {
            $itemWithChildren = !empty($item['children']) ? ' has-children' : '';

            $menuList .= '<li class="'.$listItemClasses. $itemWithChildren.'">';
            $menuList .= '<a class="'.$linkClasses.'" href="' . $item['url'] . '">' . $item['title'] . '</a>';
            if(!empty($item['children'])) {
                $menuList .= '<ul class="submenu">';
                foreach ($item['children'] as $child) {
                    $menuList .= '<li><a href="'.$child['url'].'">'. $child['title'] . '</a></li>';
                }
                $menuList .= '</ul>';
            }
            $menuList .='</li>';
        }
        if($wrapper) {
            $menuList .= '</div>';
        }
        $menuList .= '</ul></nav>';
        return $menuList;
    }

    /**
     * Return array of menu
     *
     * @param string $menuName
     * @return array
     */
    public static function build_menu(string $menuName): array {
        $array_menu = wp_get_nav_menu_items($menuName);
        if($array_menu){
            $menu = array();
            foreach ($array_menu as $m) {
                if (empty($m->menu_item_parent)) {
                    $menu[$m->ID] = array();
                    $menu[$m->ID]['ID']      =   $m->ID;
                    $menu[$m->ID]['title']       =   $m->title;
                    $menu[$m->ID]['url']         =   $m->url;
                    $menu[$m->ID]['children']    =   array();
                }
            }
            $submenu = array();
            foreach ($array_menu as $m) {
                if ($m->menu_item_parent) {
                    $submenu[$m->ID] = array();
                    $submenu[$m->ID]['ID']       =   $m->ID;
                    $submenu[$m->ID]['title']    =   $m->title;
                    $submenu[$m->ID]['url']  =   $m->url;
                    $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
                }
            }
        } else {
            $menu = [];
        }
        return $menu;
    }

    /**
     * Get the yoast breadcrumb
     *
     * @return false|string
     */
    public static function get_breadcrumbs() {
        if((function_exists('yoast_breadcrumb')) && (!is_home() && !is_front_page())) {
            $breadcrumb = '<div id="breadcrumbs">';
            $breadcrumb .= yoast_breadcrumb( '<p>','</p>' );
            $breadcrumb .= '</div>';
            return $breadcrumb;
        }
        return false;
    }

    /**
     * Add Yoast sitemap if it exists
     *
     * @param string $linkClass
     * @return false|string
     */
    public static function get_yoast_sitemap(string $linkClass = '') {
        $sitemap = '<a class="'.$linkClass.'" href="'.get_site_url().'/sitemap.xml" target="_blank"/>Sitemap</a>';
        return (in_array('wordpress-seo/wp-seo.php', apply_filters('active_plugins', get_option('active_plugins')))) ? $sitemap : false;
    }

    /**
     * Contact buttons
     *
     * @return string
     */
    function contact_buttons() : string {
        $phone = Theme::get_theme_option('theme_company_phone');
        $phoneLink = str_replace(' ','', $phone);
        $mail = Theme::get_theme_option('theme_company_email');
        return '<p class="btns"><a class="btn mail" href="mailto:'.$mail.'">'.$mail.'</a> <a class="btn outline phone" href="tel:'.$phoneLink.'">'.$phone.'</a></p>';
    }

    /**
     * Display a theme error
     *
     * @param string $msg
     * @return string
     */
    public static function return_error(string $msg): string {
        return '<div class="d-inline-block p-md bg-light-grey"><i class="fa-solid fa-triangle-exclamation p-r-sm"></i> '.$msg.'</div>';
    }

}