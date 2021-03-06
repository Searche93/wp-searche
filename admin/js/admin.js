jQuery(function($){
    /**
     * Add tabs to admin theme options
     */
    $('.tab').on('click', function() {
        let id = $(this).attr('id');
        $('.tab-content, .tab').removeClass('active');
        $('#'+id).addClass('active');
        $('#tab-'+id).addClass('active');
    });

    /**
     * Upload a logo
     */
    $('.theme-logo, .theme-header-img, .theme-favicon').on( 'click',function(e){
        e.preventDefault();
        let button = $(this),
            custom_uploader = wp.media({
                title: 'Insert image',
                library : {
                    type : 'image'
                },
                button: {
                    text: 'Use this image'
                },
                multiple: false
            }).on('select', function() {
                let attachment = custom_uploader.state().get('selection').first().toJSON();
                button.html('<img src="' + attachment.url + '">').next().show().next().val(attachment.id);
            }).open();
    });

    /**
     * Remove logo
     */
    $('.remove-logo, .remove-theme-header-img, .remove-favicon').on('click',function(e){
        e.preventDefault();
        let button = $(this);
        console.log(button);
        button.next().val('');
        button.hide().prev().html('Upload image');
    });
});