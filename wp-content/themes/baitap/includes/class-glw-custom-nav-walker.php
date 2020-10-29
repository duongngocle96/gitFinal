<?php

class GLW_Custom_Nav_Walker extends Walker_Nav_Menu{

    public function start_lvl(&$output, $depth = 0 , $args = array()){
        $output .= '<ul class="dropdown-menu">';
    }

    public function start_el(&$output , $item , $depth = 0, $args = array() , $id = 0){
        // class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-6"
        $class_li = $class_a = '';
        // lấy các class tự sinh ra của WordPress
        // $default_wp_class_li
        $arr_class_li = empty($item->classes) ? array() : (array) $item->classes;
        // add class định danh riêng menu item
        array_push($arr_class_li, 'menu-item-'.$item->ID);
        // chuyển từ mảng sang chuỗi
        // $class_li = implode(' ',apply_filters('nav_menu_css_class', array_filter($arr_class_li), $item, $args));
        $class_li .= ' menu-item-'.$item->ID.' ';
        // kiểm tra có menu con thì thêm class
        if($args->has_children && $depth === 0){
            $class_li .= ' dropdown ';
        }elseif($args->has_children && $depth > 0){
            $class_li .= ' dropdown-submenu ';
        }
        // kiểm tra link có active
        if(in_array('current-menu-item', $arr_class_li)){
            $class_a .= ' active ';
        }
        // menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-6
        $class_li = !empty($class_li) ? ' class="'.esc_attr($class_li) .'" ':'';
        $class_a = !empty($class_a) ? ' class="'.esc_attr($class_a) .'" ':'';

        // gán id cho các menu item thẻ li       
        $id_li = apply_filters('nav_menu_item_id','menu-item-'.$item->ID, $item, $args);
        $id_li = !empty($id_li) ? ' id="'.esc_attr($id_li).'" ':'';

        // ghép nối thẻ li
        $output .= '<li'.$id_li.$class_li.'>';

        // chỉnh sửa thẻ a
        $atts = array();
        $atts['title']  = ! empty( $item->title )	? $item->title	: '';
        $atts['target'] = ! empty( $item->target )	? $item->target	: '';
        $atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';

        // If item has_children add atts to a.
        // if ( $args->has_children && $depth === 0 ) {
        if ( $args->has_children ) {
            $atts['href']   		= '#';
            $atts['data-toggle']	= 'dropdown';
            $atts['class']			= 'dropdown-toggle';
        } else {
            $atts['href'] = ! empty( $item->url ) ? $item->url : '';
        }

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

        $attr_a = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attr_a .= ' ' . $attr . '="' . $value . '"';
            }
        }
        // ráp tất cả các thành phần thẻ a lại với nhau
        $item_output = $args->before;
        $item_output .= '<a'.$attr_a.' '.$class_a.'>';
        $item_output .=  $args->link_before.apply_filters('the_title',$item->title,$item->ID).$args->link_after;
        $item_output .= ($args->has_children && $depth === 0) ? ' <i class="zmdi zmdi-chevron-down"></i></a>' : '</a>';
        $item_output .= $args->after;
        $output .= apply_filters('walker_nav_menu_start_el', $item_output , $item, $depth, $args);
    }

    public function end_el(&$output , $item , $depth = 0, $args = array() , $id = 0){
        $output .= '</li>';
    }
    public function end_lvl(&$output, $depth = 0 , $args = array()){
        $output .= '</ul>';
    }

    public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;

        $id_field = $this->db_fields['id'];

        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }


}