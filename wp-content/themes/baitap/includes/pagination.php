<?php

if(!function_exists('glw_custom_pagination')){
    function glw_custom_pagination( WP_Query $wp_query = null , $echo = true){
        if($wp_query === null){
            global $wp_query;
        }

        $pages = paginate_links( array(
            'base'  => str_replace(9999999999, '%#%', esc_url(get_pagenum_link( 9999999999))),
            'format'    => '?paged=%#%',
            'current'   => max(1, get_query_var('paged')),
            'total'     => $wp_query->max_num_pages,
            'type'      => 'array',
            'show_all'  => false,
            'end_size'  => 2,
            'mid_size'  => 1,
            'prev_next' => true,
            'prev_text' => '<i class="zmdi zmdi-chevron-left"></i>',
            'next_text' => '<i class="zmdi zmdi-chevron-right"></i>',
            'add_args'  => false,
            'add_fragment'  => ''
        ));
        if(is_array($pages)){
            $pagination = '<div class="rt-pagination pt-60 text-center">
                               <ul class="clearfix">';
            foreach($pages as $page){
                $pagination .= '<li'. (strpos($page,'current')!== false ? ' class="active" ':'') .'>';
                if(strpos($page,'current')!== false){
                    if(get_query_var( 'paged' )>1){
                        $pagination .='<a>'.get_query_var( 'paged' ).'</a>';
                    }else{
                        $pagination .= '<a>'. 1 .'</a>';
                    }       
                }else{
                    $pagination .= str_replace('class="page-numbers"','',$page);
                }
                $pagination .='</li>';
            }
            // $pagination  .=   

            $pagination .= '</ul></div>';
            echo $pagination;
        }
        return null;
    }
}