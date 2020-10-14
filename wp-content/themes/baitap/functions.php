<?php 
	//code mặc định khi lập trình thêm woo

	function my_custom_wc_support(){
		add_theme_support('woocommerce');
		add_theme_support('wc-product-gallery-lightbox');
		add_theme_support('wc-product-gallery-slide');

	}
	function initTheme(){
		//chuyển trình saọn thảo phiên bản mới về cũ
		add_filter('use_block_editor_for_post','__return_false');
		//đăng kí các menu..
		register_nav_menu('header-main',__('menu main'));
		register_nav_menu('header-category',__('menu categories'));
		register_nav_menu('menu_footer',__('menu footer'));
				//đăng kí saidebar..
		if (function_exists('register_sidebar')){
    		register_sidebar(array(
			    'name'=> 'Cột bên',
			    'id' => 'sidebar',
		));
		}
		//đếm số view trong bài viêt..
		function setpostview( $postID ) {
			 $count_key = 'views';
			 $count     = get_post_meta( $postID, $count_key, true );
			 if ( $count == '' ) {
			 	  $count = 0;
			 delete_post_meta( $postID, $count_key );
			 add_post_meta( $postID, $count_key, '0' ); 
			 }else{
			 	  $count++;
			 update_post_meta( $postID, $count_key, $count );

			 }	
		} 
		function getpostview( $postID ) {
			 $count_key = 'views';
			 $count     =get_post_meta( $postID, $count_key, true );
			 if ( $count == '' ) {

			 delete_post_meta( $postID, $count_key );
			 add_post_meta( $postID, $count_key, '0' );
			 return "0";
			 }   
			 return $count;
		}
	}
	add_theme_support( 'post-thumbnails' );
	add_action('init', 'initTheme');


class nav_walker extends Walker_Nav_Menu {

public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

		$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		
		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

		
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $class_names . '>';

		$atts           = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target ) ? $item->target : '';
		if ( '_blank' === $item->target && empty( $item->xfn ) ) {
			$atts['rel'] = 'noopener noreferrer';
		} else {
			$atts['rel'] = $item->xfn;
		}
		$atts['href']         = ! empty( $item->url ) ? $item->url : '';
		$atts['aria-current'] = $item->current ? 'page' : '';

		
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( is_scalar( $value ) && '' !== $value && false !== $value ) {
				$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		
		$title = apply_filters( 'the_title', $item->title, $item->ID );

		
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

		$item_output  = $args->before;
		$item_output .= '<a' . ' ' .'class="nav-link"'. $attributes . '>';
		$item_output .= $args->link_before . $title . $args->link_after;

		$item_output .= '</a>';
		$item_output .= $args->after;

		
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
/**
@ Hàm hiển thị ảnh thumbnail của post.
@ Ảnh thumbnail sẽ không được hiển thị trong trang single
@ Nhưng sẽ hiển thị trong single nếu post đó có format là Image
@ thachpham_thumbnail( $size )
**/
if ( ! function_exists( 'thachpham_thumbnail' ) ) {
  function thachpham_thumbnail( $size ) {
 
    // Chỉ hiển thumbnail với post không có mật khẩu
    if ( ! is_single() &&  has_post_thumbnail()  && ! post_password_required() || has_post_format( 'image' ) ) : ?>
      <figure class="post-thumbnail"><?php the_post_thumbnail( $size ); ?></figure><?php
    endif;
  }
}
/**
@ Hàm hiển thị tiêu đề của post trong .entry-header
@ Tiêu đề của post sẽ là nằm trong thẻ <h1> ở trang single
@ Còn ở trang chủ và trang lưu trữ, nó sẽ là thẻ <h2>
@ thachpham_entry_header()
**/
if ( ! function_exists( 'thachpham_entry_header' ) ) {
  function thachpham_entry_header() {
    if ( is_single() ) : ?>
 
      <h1 class="entry-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          <?php the_title(); ?>
        </a>
      </h1>
    <?php else : ?>
      <h2 class="entry-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          <?php the_title(); ?>
        </a>
      </h2><?php
 
    endif;
  }
}


/*
 * Thêm chữ Read More vào excerpt
 */
function thachpham_readmore() {
  return '...<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'thachpham') . '</a>';
}
add_filter( 'excerpt_more', 'thachpham_readmore' );
 
/**
@ Hàm hiển thị nội dung của post type
@ Hàm này sẽ hiển thị đoạn rút gọn của post ngoài trang chủ (the_excerpt)
@ Nhưng nó sẽ hiển thị toàn bộ nội dung của post ở trang single (the_content)
@ thachpham_entry_content()
**/
if ( ! function_exists( 'thachpham_entry_content' ) ) {
  function thachpham_entry_content() {
 
    if ( ! is_single() ) :
      the_excerpt();
    else :
      the_content();

 
    endif;
 
  }
}

