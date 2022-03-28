<?php

use Searche\Classes\ThemeTemplates;
use Searche\Classes\ThemeColors;

?>

<div class="wrap">
    <div class="row">
        <h1 class="wp-heading-inline">Theme Options</h1>
        <form action="options.php" method="post" enctype="multipart/form-data">
            <?php settings_errors(); ?>
            <?php settings_fields( 'theme-settings-group' ); ?>
            <?php do_settings_sections( 'theme-settings-group' ); ?>
            <div class="tab-row">
                <ul id="tabs" class="tab-list">
                    <li id="general" class="tab active">General</li>
                    <li id="colors" class="tab">Colors</li>
                    <li id="templates" class="tab">Templates</li>
                    <li id="social" class="tab">Social</li>
                </ul>

                <div class="tab-items">
                    <div class="row pull-right m-r-md">
                        <?=submit_button();?>
                    </div>
                    <div id="tab-general" class="tab-content active">
                        <h2>General</h2>
                        <div class="form-row m-t-md">
                            <label for="theme_company_name"><?php _e('Company name', 'wp-searche');?></label>
                            <input type="text" id="theme_company_name" name="theme_company_name" value="<?=ThemeTemplates::get_theme_option('theme_company_name');?>">
                        </div>
                        <div class="form-row">
                            <label for="theme_company_address"><?php _e('Company Address', 'wp-searche');?></label>
                            <input type="text" id="theme_company_address" name="theme_company_address" value="<?=ThemeTemplates::get_theme_option('theme_company_address');?>">
                        </div>
                        <div class="form-row">
                            <label for="theme_company_zip"><?php _e('Company Zipcode', 'wp-searche');?></label>
                            <input type="text" id="theme_company_zip" name="theme_company_zip" value="<?=ThemeTemplates::get_theme_option('theme_company_zip');?>">
                        </div>
                        <div class="form-row">
                            <label for="theme_company_email"><?php _e('Company Email', 'wp-searche');?></label>
                            <input type="text" id="theme_company_email" name="theme_company_email" value="<?=ThemeTemplates::get_theme_option('theme_company_email');?>">
                        </div>
                        <div class="form-row">
                            <label for="theme_company_phone"><?php _e('Company Phone', 'wp-searche');?></label>
                            <input type="text" id="theme_company_phone" name="theme_company_phone" value="<?=ThemeTemplates::get_theme_option('theme_company_phone');?>">
                        </div>

                        <div class="form-row">
                            <h3>Logo</h3>
                            <?php
                            $logoId = ThemeTemplates::get_theme_option('theme_logo');
                            if( $logo = wp_get_attachment_image_src( $logoId ) ):?>
                                <div class="logo-box">
                                    <a href="#" class="theme-logo"><img src="<?=$logo[0];?>" alt="logo"/></a>
                                    <a href="#" class="remove-logo">Remove image</a>
                                    <input type="hidden" name="theme_logo" value="<?=$logoId;?>">
                                </div>
                            <?php else :?>
                                <div class="logo-box">
                                    <a href="#" class="theme-logo">Upload image</a>
                                    <a href="#" class="remove-logo" style="display:none">Remove image</a>
                                    <input type="hidden" name="theme_logo" value="<?=$logoId;?>">
                                </div>
                            <?php endif;?>
                        </div>

                        <div class="form-row">
                            <h3>Favicon</h3>
                            <p>Recommended image size: 16px by 16px</p>
                            <?php
                            $favIconId = ThemeTemplates::get_theme_option('theme_favicon');
                            if( $favicon = wp_get_attachment_image_src( $favIconId ) ):?>
                                <div class="logo-box">
                                    <a href="#" class="theme-favicon"><img src="<?=$favicon[0];?>" alt="favicon"/></a>
                                    <a href="#" class="remove-favicon">Remove image</a>
                                    <input type="hidden" name="theme_favicon" value="<?=$favIconId;?>">
                                </div>
                            <?php else :?>
                                <div class="logo-box">
                                    <a href="#" class="theme-favicon">Upload image</a>
                                    <a href="#" class="remove-favicon" style="display:none">Remove image</a>
                                    <input type="hidden" name="theme_favicon" value="<?=$favIconId;?>">
                                </div>
                            <?php endif;?>
                        </div>

                        <div class="form-row m-t-md">
                            <h3>Header image</h3>
                            <?php
                            $imageId = ThemeTemplates::get_theme_option('theme_header_img');
                            if( $image = wp_get_attachment_image_src( $imageId ) ):?>
                                <div class="logo-box">
                                    <a href="#" class="theme-header-img"><img src="<?=$image[0];?>" alt="header-img"/></a>
                                    <a href="#" class="remove-theme-header-img">Remove image</a>
                                    <input type="hidden" name="theme_header_img" value="<?=$imageId;?>">
                                </div>
                            <?php else :?>
                                <div class="logo-box">
                                    <a href="#" class="theme-header-img">Upload image</a>
                                    <a href="#" class="remove-theme-header-img" style="display:none">Remove image</a>
                                    <input type="hidden" name="theme_header_img" value="<?=$imageId;?>">
                                </div>
                            <?php endif;?>
                        </div>

                    </div> <!-- tab-content -->

                    <div id="tab-colors" class="tab-content">
                        <h2>Colors</h2>
                        <div class="form-row">
                            <label for="theme_primary_color">Primary color</label>
                            <input type="color" id="theme_primary_color" name="theme_primary_color" value="<?=ThemeColors::get_primary_color();?>">
                        </div>
                        <div class="form-row">
                            <label for="theme_secondary_color">Secondary color</label>
                            <input type="color" id="theme_secondary_color" name="theme_secondary_color" value="<?=ThemeColors::get_secondary_color();?>">
                        </div>
                        <div class="form-row">
                            <label for="theme_tertiary_color">Tertiary color</label>
                            <input type="color" id="theme_tertiary_color" name="theme_tertiary_color" value="<?=ThemeColors::get_tertiary_color();?>">
                        </div>
                        <div class="form-row m-b-md">
                            <label for="theme_extra_color">Extra color</label>
                            <input type="color" id="theme_extra_color" name="theme_extra_color" value="<?=ThemeColors::get_extra_color();?>">
                        </div>

                        <div class="form-row">
                            <label for="theme_body_bg_color">Body background color</label>
                            <input type="color" id="theme_body_bg_color" name="theme_body_bg_color" value="<?=ThemeColors::get_body_bg_color();?>">
                        </div>
                        <div class="form-row">
                            <label for="theme_header_bg_color">Header background color</label>
                            <input type="color" id="theme_header_bg_color" name="theme_header_bg_color" value="<?=ThemeColors::get_header_bg_color();?>">
                        </div>
                        <div class="form-row">
                            <label for="theme_content_bg_color">Content background color</label>
                            <input type="color" id="theme_content_bg_color" name="theme_content_bg_color" value="<?=ThemeColors::get_content_bg_color();?>">
                        </div>
                        <div class="form-row">
                            <label for="theme_footer_bg_color">Footer background color</label>
                            <input type="color" id="theme_footer_bg_color" name="theme_footer_bg_color" value="<?=ThemeColors::get_footer_bg_color();?>">
                        </div>
                    </div> <!-- tab-content -->


                    <div id="tab-templates" class="tab-content">
                        <h2>Templates</h2>

                        <div class="form-row">
                            <label for="theme_wrapper_width">Wrapper width <small>(px)</small></label>
                            <input type="number" id="theme_wrapper_width" name="theme_wrapper_width" value="<?=ThemeTemplates::get_theme_option('theme_wrapper_width');?>">
                        </div>
                        <div class="form-row">
                            <label for="header">Header</label>
                            <select name="theme_header" id="header">
                                <?php
                                $headers = ThemeTemplates::get_template_files_and_names('header');
                                foreach ($headers as $key => $header) {
                                    $selected = ($key === ThemeTemplates::get_theme_option('theme_header')) ? 'selected' : '';
                                    echo '<option id="'.$key.'" value="'.$key.'" '.$selected.'>'.$header.'</option>';
                                }?>
                            </select>
                        </div>
                        <div class="form-row">
                            <label for="theme_header_fullwidth">Fullwidth header</label>
                            <input name="theme_header_fullwidth" id="theme_header_fullwidth" type="checkbox" value="true" <?=(ThemeTemplates::fullwidth_header()) ? 'checked' : '';?>>
                        </div>
                        <div class="form-row">
                            <label for="footer">Footer</label>
                            <select name="theme_footer" id="footer">
                                <?php
                                $footers = ThemeTemplates::get_template_files_and_names('footer');
                                foreach ($footers as $key => $footer) {
                                    $selected = ($key === ThemeTemplates::get_theme_option('theme_footer')) ? 'selected' : '';
                                    echo '<option id="'.$key.'" value="'.$key.'" '.$selected.'>'.$footer.'</option>';
                                }?>
                            </select>
                        </div>
                        <div class="form-row">
                            <label for="theme_footer_fullwidth">Fullwidth footer</label>
                            <input id="theme_footer_fullwidth" name="theme_footer_fullwidth" type="checkbox" value="true" <?=(ThemeTemplates::fullwidth_footer()) ? 'checked' : '';?>>
                        </div>
                        <div class="form-row">
                            <label for="theme_sidebar">Sidebar</label>
                            <select name="theme_sidebar" id="theme_sidebar">
                                <?php
                                $sidebars = ['Left', 'Right'];
                                foreach ($sidebars as $key => $sidebar) {
                                    $selected = (strtolower($sidebar) === ThemeTemplates::get_theme_option('theme_sidebar')) ? 'selected' : '';
                                    echo '<option id="'.$key.'" value="'.strtolower($sidebar).'" '.$selected.'>'.$sidebar.'</option>';
                                }?>
                            </select>
                        </div>
                        <div class="form-row">
                            <label for="theme_no_sidebar">Disable sidebar</label>
                            <input name="theme_no_sidebar" id="theme_no_sidebar" type="checkbox" value="true" <?=(ThemeTemplates::sidebar_disabled()) ? 'checked' : '';?>>
                        </div>
                    </div> <!-- tab-content -->

                    <div id="tab-social" class="tab-content">
                        <h2>Social</h2>

                        <div class="form-row">
                            <label for="theme_whatsapp">Whatsapp</label>
                            <input type="text" id="theme_whatsapp" name="theme_whatsapp" value="<?=ThemeTemplates::get_theme_option('theme_whatsapp');?>">
                        </div>
                        <div class="form-row">
                            <label for="theme_facebook">Facebook</label>
                            <input type="text" id="theme_facebook" name="theme_facebook" value="<?=ThemeTemplates::get_theme_option('theme_facebook');?>">
                        </div>
                        <div class="form-row">
                            <label for="theme_instagram">Instagram</label>
                            <input type="text" id="theme_instagram" name="theme_instagram" value="<?=ThemeTemplates::get_theme_option('theme_instagram');?>">
                        </div>
                        <div class="form-row">
                            <label for="theme_linkedin">LinkedIn</label>
                            <input type="text" id="theme_linkedin" name="theme_linkedin" value="<?=ThemeTemplates::get_theme_option('theme_linkedin');?>">
                        </div>
                        <div class="form-row">
                            <label for="theme_pinterest">Pinterest</label>
                            <input type="text" id="theme_pinterest" name="theme_pinterest" value="<?=ThemeTemplates::get_theme_option('theme_pinterest');?>">
                        </div>
                    </div> <!-- tab-content -->

                </div> <!-- tab-items -->
            </div> <!-- tab-row -->
            <div class="row pull-right m-r-md">
                <?=submit_button();?>
            </div>
        </form>
    </div>
</div>