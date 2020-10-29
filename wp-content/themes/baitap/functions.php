<?php
    define( 'THEME_URL' , get_stylesheet_directory());
    define('CORE', THEME_URL . "/core");
    require_once( CORE . "/init.php" );
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
if ( ! function_exists( 'baitap_thumbnail' ) ) {
  function baitap_thumbnail( $size ) {
 
    // Chỉ hiển thumbnail với post không có mật khẩu
    if ( ! is_page() &&  has_post_thumbnail()  && ! post_password_required() || has_post_format( 'image' ) ) : ?>
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
if ( ! function_exists( 'baitap_entry_header' ) ) {
  function baitap_entry_header() {
    if ( is_page() ) : ?>
 
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
/**
@ Hàm hiển thị thông tin của post (Post Meta)
@ thachpham_entry_meta()
**/
if( ! function_exists( 'baitap_entry_meta' ) ) {
  function bbaitapaitap_entry_meta() {
    if ( ! is_page() ) :
      echo '<div class="entry-meta">';
 
        // Hiển thị tên tác giả, tên category và ngày tháng đăng bài
        printf( __('<span class="author">Posted by %1$s</span>', 'baitap'),
          get_the_author() );
 
        printf( __('<span class="date-published"> at %1$s</span>', 'baitap'),
          get_the_date() );
 
        printf( __('<span class="category"> in %1$s</span>', 'baitap'),
          get_the_category_list( ', ' ) );
 
        // Hiển thị số đếm lượt bình luận
        if ( comments_open() ) :
          echo ' <span class="meta-reply">';
            comments_popup_link(
              __('Leave a comment', 'baitap'),
              __('One comment', 'baitap'),
              __('% comments', 'baitap'),
              __('Read all comments', 'baitap')
             );
          echo '</span>';
        endif;
      echo '</div>';
    endif;
  }}

/*
 * Thêm chữ Read More vào excerpt
 */
function baitap_readmore() {
  return '...<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'baitap') . '</a>';
}
add_filter( 'excerpt_more', 'baitap_readmore' );
 
/**
@ Hàm hiển thị nội dung của post type
@ Hàm này sẽ hiển thị đoạn rút gọn của post ngoài trang chủ (the_excerpt)
@ Nhưng nó sẽ hiển thị toàn bộ nội dung của post ở trang single (the_content)
@ thachpham_entry_content()
**/
if ( ! function_exists( 'baitap_entry_content' ) ) {
  function baitap_entry_content() {
 
    if ( ! is_page()) :
      the_excerpt();
    else :
      the_content();
 
      /*
       * Code hiển thị phân trang trong post type
       */
      $link_pages = array(
        'before' => __('<p>Page:', 'baitap'),
        'after' => '</p>',
        'nextpagelink'     => __( 'Next page', 'baitap' ),
        'previouspagelink' => __( 'Previous page', 'baitap' )
      );
      wp_link_pages( $link_pages );
    endif;
 
  }
}
//remove_filter( 'the_content', 'wpautop' );


function wp_get_pagination($getposts)
{
  $big = 999999999; // need an unlikely integer
  //global $wp_query;
  $pages = paginate_links(array(
    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
    'format' => '?paged=%#%',
    'prev_text'    => __('<<'),
    'next_text'    => __('>>'),
    'current' => max(1, get_query_var('paged')),
    'total' => $getposts->max_num_pages,
    'type'  => 'array',

  ));
  
    if( is_array( $pages ) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<div class="col-lg-12"><ul class="page-numbers">';
        foreach ( $pages as $page ) {
                echo "<li>$page</li>";
        }
       echo '</ul></div>';
        }
}
/*--------
TEMPLATE FUNCTIONS */
if (!function_exists('thachpham_header')) {
    function thachpham_header() { ?>
        <div class="site-name">
            <?php
            global $tp_options;

            if( $tp_options['logo-on'] == 0 ) :
                ?>
                <?php
                if ( is_home() ) {
                    printf( '<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
                        get_bloginfo('url'),
                        get_bloginfo('description'),
                        get_bloginfo('sitename') );
                } else {
                    printf( '<p><a href="%1$s" title="%2$s">%3$s</a></p>',
                        get_bloginfo('url'),
                        get_bloginfo('description'),
                        get_bloginfo('sitename') );
                }
                ?>

            <?php
            else :
                ?>
                <img src="<?php echo $tp_options['logo-image']['url']; ?>" />
            <?php endif; ?>
        </div>
        <div class="site-description"><?php bloginfo('description'); ?></div><?php
    }
}
function setting_footer(){
    global $tp_options;
    echo '' . $tp_options['footer'];
}
function sdt(){
    global $tp_options;
    echo '' . $tp_options['sdt'];
}
function Email(){
    global $tp_options;
    echo '' . $tp_options['mail'];
}
function add(){
    global $tp_options;
    echo '' . $tp_options['add'];
}


add_action( 'admin_init', 'register_settings' );
//add css baitap theme
function baitap_styles()
{
    wp_enqueue_style('custom', get_template_directory_uri() . '/assets/css/custom.css', 'all');
    wp_enqueue_style('templatemo-stand-blog', get_template_directory_uri() . '/assets/css/templatemo-stand-blog.css', 'all');
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.css', 'all');
    wp_enqueue_style('owl', get_template_directory_uri() . '/assets/css/owl.css', 'all');
}
add_action( 'wp_enqueue_scripts', 'baitap_styles' );

function js_style()
{
    //add style.js
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/vendor/jquery/jquery.min.js',[], null, true);
    wp_enqueue_script( 'bundle', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.bundle.min.js',[],null, true);
    wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/custom.js',[], null, true);
    wp_enqueue_script( 'owl', get_template_directory_uri() . '/assets/js/owl.js',[], null, true);
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.js',[], null,true);
    wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/isotope.js ',[], null, true);
    wp_enqueue_script( 'accordions', get_template_directory_uri() . '/assets/js/accordions.js',[], '1.1',true);
}
add_action( 'wp_enqueue_scripts', 'js_style' );