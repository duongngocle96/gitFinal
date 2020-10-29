<?php

if(!function_exists('glw_sidebars_init')){
    function glw_sidebars_init(){
        register_sidebar( array(
            'name'          => __('Primary sidebar','glw'),
            'id'            => 'glw_primary_sidebar',
            'description'   => 'Sidebar for Goclamweb theme',
            'before_widget' => '<div class="widget mb-45">',
            'after_widget'  => '</div>',
            'before_title' => '<div class="widget-title mb-30"><h5 class="mb-5">',
            'after_title'   =>  '</h5><div class="horizontal-line">
                                    <hr class="top">
                                    <hr class="bottom">
                                    </div></div>'
        ));
        register_sidebar( array(
            'name'          => __('Footer 1','glw'),
            'id'            => 'glw_footer1_sidebar',
            'description'   => 'Footer 1 for Goclamweb theme',
            'before_widget' => '<div class="footer-widget address">',
            'after_widget'  => '</div>',
            'before_title' => '<div class="title mb-40">
                                    <h4 class="text-capitalize">',
            'after_title'   =>  '</h4>
                                <div class="horizontal-line">
                                <hr class="top">
                                <hr class="bottom">
                                </div></div>'
        ));
    }
} 