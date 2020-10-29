<?php

if(!function_exists('glw_post_excerpt')){
    function glw_post_excerpt($limit, $id_post){
        // string rất dài
        $excerpt = explode(' ', get_the_excerpt(  ), $limit); // array có số phần tử = limit
        array_pop($excerpt);
        $excerpt = implode(' ',$excerpt ).'... <a href="'.get_permalink( $id_post ).'">'.__('Read more','glw').'</a>';
        echo $excerpt;
    }
}
if(!function_exists('glw_post_title')){
    function glw_post_title($limit, $id_post){
        // string rất dài
        $title = explode(' ', get_the_title(  ), $limit); // array có số phần tử = limit
        array_pop($title);
        $title = implode(' ',$title );
        echo $title;
    }
}