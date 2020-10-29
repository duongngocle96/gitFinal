<?php
if(!function_exists('glw_theme_setup')){
    function glw_theme_setup(){
        // text domain - translate
        $lang_folder = get_theme_file_path( '/languages' );
        load_theme_textdomain( 'glw', $lang_folder );
        // title tag
        add_theme_support( 'title-tag' );
        add_theme_support(
            'html5',
            array('comment-list','comment-form','search-form','gallery','caption')
        );
        // menu
        register_nav_menu( 'glw_primary_menu', __('Primary Menu','glw') );
        // register_nav_menu( 'glw_footer_menu', __('Primary Menu','glw') );
        // register_nav_menu( 'glw_top_menu', __('Primary Menu','glw') );

        // post thumbnail
        add_theme_support( 'post-thumbnails');
        // link rsss
        add_theme_support( 'automatic-feed-link' );
        // image size
        add_image_size( 'grid_post_thumbnail', 370, 216, true );
        add_image_size( 'list_post_thumbnail', 770, 400, true );
        add_image_size( 'single_post_thumbnail', 800, 430, true );
        add_image_size( 'list_mini_thumbnail', 80, 80, true );
        add_image_size( 'author_thumbnail', 82, 82, true );

        add_theme_support( 'post-formats', array(
            'quote'
        ));
    }
}
?>