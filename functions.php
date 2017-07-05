<?php
/*
Author: Eddie Machado
URL: http://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

// LOAD BONES CORE (if you remove this, the theme will break)
require_once( 'library/bones.php' );

// USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
//require_once( 'library/custom-post-type.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once( 'library/admin.php' );

/*********************
LAUNCH BONES
Let's get everything up and running.
*********************/

function bones_ahoy() {

  // let's get language support going, if you need it
  load_theme_textdomain( 'bonestheme', get_template_directory() . '/library/translation' );

  // launching operation cleanup
  add_action( 'init', 'bones_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'bones_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'bones_gallery_style' );

    // enqueue base scripts and styles
    add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );
    // ie conditional wrapper

    // launching this stuff after theme setup
    add_action( 'after_setup_theme', 'bones_theme_support', 5);

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'bones_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'bones_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'bones_excerpt_more' );

} /* end bones ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'bones_ahoy' );


/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 680;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'bones-thumb-600' => __('600px by 150px'),
        'bones-thumb-300' => __('300px by 100px'),
    ) );
}

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {

  register_sidebar(array(
		'id' => 'sidebar-header',
		'name' => __( 'Sidebar Header', 'bonestheme' ),
		'description' => __( 'The Header sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

  register_sidebar(array(
		'id' => 'sidebar-main',
		'name' => __( 'Sidebar Main', 'bonestheme' ),
		'description' => __( 'The main (default) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

     register_sidebar(array(
		'id' => 'sidebar-contact',
		'name' => __( 'Footer Contact', 'bonestheme' ),
		'description' => __( 'The footer contact area.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

    register_sidebar(array(
		'id' => 'sidebar-legal',
		'name' => __( 'Footer Legal', 'bonestheme' ),
		'description' => __( 'The footer legal area.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

  register_sidebar(array(
		'id' => 'sidebar-testimonials',
		'name' => __( 'Footer Testimonials', 'bonestheme' ),
		'description' => __( 'The footer testimonial area.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

      register_sidebar(array(
		'id' => 'sidebar-news',
		'name' => __( 'News Sidebar', 'bonestheme' ),
		'description' => __( 'The news widget area.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

    register_sidebar(array(
		'id' => 'sidebar-footer',
		'name' => __( 'Footer Signoff', 'bonestheme' ),
		'description' => __( 'Widgetised area in the footer.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

      register_sidebar(array(
		'id' => 'sidebar-tatton',
		'name' => __( 'Sidebar Tatton', 'bonestheme' ),
		'description' => __( 'The main sidebar for Tatton.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

     register_sidebar(array(
		'id' => 'sidebar-contact-tatton',
		'name' => __( 'Footer Contact - Tatton', 'bonestheme' ),
		'description' => __( 'The footer contact area for Tatton.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

    register_sidebar(array(
		'id' => 'sidebar-legal-tatton',
		'name' => __( 'Footer Legal for Tatton', 'bonestheme' ),
		'description' => __( 'The footer legal area.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

  register_sidebar(array(
		'id' => 'sidebar-testimonials-tatton',
		'name' => __( 'Footer Testimonials for Tatton', 'bonestheme' ),
		'description' => __( 'The footer testimonial area.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'bonestheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!

	// wp menus
	add_theme_support( 'menus' );

	// registering wp3+ menus
	register_nav_menus(
		array(
			'main-nav' => __( 'The Main Menu', 'bonestheme' ),   // main nav in header
            'tatton-nav' => __( 'Tatton Menu', 'cil'), //mobile menu
			'footer-links' => __( 'Footer Links', 'bonestheme' ) // secondary nav in footer
		)
	);

/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
    <article>
      <header class="comment-author vcard">
        <?php
        /*
          this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
          echo get_avatar($comment,$size='32',$default='<path_to_url>' );
        */
        ?>
        <?php // custom gravatar call ?>
        <?php
          // create variable
          $bgauthemail = get_comment_author_email();
        ?>
        <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
        <?php // end custom gravatar call ?>
        <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'bonestheme' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>

      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content">
        <?php comment_text() ?>
      </section>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>
  <?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!


/*
This is a modification of a function found in the
twentythirteen theme where we can declare some
external fonts. If you're using Google Fonts, you
can replace these fonts, change it in your scss files
and be up and running in seconds.
*/
function google_fonts() {
  wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
  wp_enqueue_style( 'googleFonts');
}

add_action('wp_print_styles', 'google_fonts');

if (is_page_template('page-template-page-tatton')) {
	class wp_bootstrap_navwalker extends Walker_Nav_Menu {
	  /**
	   * @see Walker::start_lvl()
	   * @since 3.0.0
	   *
	   * @param string $output Passed by reference. Used to append additional content.
	   * @param int $depth Depth of page. Used for padding.
	   */
	  public function start_lvl( &$output, $depth = 0, $args = array() ) {
	    $indent = str_repeat( "\t", $depth );
	    $output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
	  }
	  /**
	   * @see Walker::start_el()
	   * @since 3.0.0
	   *
	   * @param string $output Passed by reference. Used to append additional content.
	   * @param object $item Menu item data object.
	   * @param int $depth Depth of menu item. Used for padding.
	   * @param int $current_page Menu item ID.
	   * @param object $args
	   */
	  public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
	    /**
	     * Dividers, Headers or Disabled
	     * =============================
	     * Determine whether the item is a Divider, Header, Disabled or regular
	     * menu item. To prevent errors we use the strcasecmp() function to so a
	     * comparison that is not case sensitive. The strcasecmp() function returns
	     * a 0 if the strings are equal.
	     */
	    if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
	      $output .= $indent . '<li role="presentation" class="divider">';
	    } else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
	      $output .= $indent . '<li role="presentation" class="divider">';
	    } else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
	      $output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
	    } else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
	      $output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
	    } else {
	      $class_names = $value = '';
	      $classes = empty( $item->classes ) ? array() : (array) $item->classes;
	      $classes[] = 'menu-item-' . $item->ID;
	      $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
	      if ( $args->has_children )
		$class_names .= ' dropdown';
	      if ( in_array( 'current-menu-item', $classes ) )
		$class_names .= ' active';
	      $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
	      $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
	      $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
	      $output .= $indent . '<li' . $id . $value . $class_names .'>';
	      $atts = array();
	      $atts['title']  = ! empty( $item->title ) ? $item->title  : '';
	      $atts['target'] = ! empty( $item->target )  ? $item->target : '';
	      $atts['rel']    = ! empty( $item->xfn )   ? $item->xfn  : '';
	      // If item has_children add atts to a.
	      if ( $args->has_children && $depth === 0 ) {
		$atts['href']       = '#';
		$atts['data-toggle']  = 'dropdown';
		$atts['class']      = 'dropdown-toggle';
		$atts['aria-haspopup']  = 'true';
	      } else {
		$atts['href'] = ! empty( $item->url ) ? $item->url : '';
	      }
	      $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
	      $attributes = '';
	      foreach ( $atts as $attr => $value ) {
		if ( ! empty( $value ) ) {
		  $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
		  $attributes .= ' ' . $attr . '="' . $value . '"';
		}
	      }
	      $item_output = $args->before;
	      /*
	       * Glyphicons
	       * ===========
	       * Since the the menu item is NOT a Divider or Header we check the see
	       * if there is a value in the attr_title property. If the attr_title
	       * property is NOT null we apply it as the class name for the glyphicon.
	       */
	      if ( ! empty( $item->attr_title ) )
		$item_output .= '<a'. $attributes .'><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
	      else
		$item_output .= '<a'. $attributes .'>';
	      $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
	      $item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
	      $item_output .= $args->after;
	      $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	    }
	  }
	  /**
	   * Traverse elements to create list from elements.
	   *
	   * Display one element if the element doesn't have any children otherwise,
	   * display the element and its children. Will only traverse up to the max
	   * depth and no ignore elements under that depth.
	   *
	   * This method shouldn't be called directly, use the walk() method instead.
	   *
	   * @see Walker::start_el()
	   * @since 2.5.0
	   *
	   * @param object $element Data object
	   * @param array $children_elements List of elements to continue traversing.
	   * @param int $max_depth Max depth to traverse.
	   * @param int $depth Depth of current element.
	   * @param array $args
	   * @param string $output Passed by reference. Used to append additional content.
	   * @return null Null on failure with no changes to parameters.
	   */
	  public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
		if ( ! $element )
		    return;
		$id_field = $this->db_fields['id'];
		// Display this element.
		if ( is_object( $args[0] ) )
		   $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
		parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	    }
	  /**
	   * Menu Fallback
	   * =============
	   * If this function is assigned to the wp_nav_menu's fallback_cb variable
	   * and a manu has not been assigned to the theme location in the WordPress
	   * menu manager the function with display nothing to a non-logged in user,
	   * and will add a link to the WordPress menu manager if logged in as an admin.
	   *
	   * @param array $args passed from the wp_nav_menu function.
	   *
	   */
	  public static function fallback( $args ) {
	    if ( current_user_can( 'manage_options' ) ) {
	      extract( $args );
	      $fb_output = null;
	      if ( $container ) {
		$fb_output = '<' . $container;
		if ( $container_id )
		  $fb_output .= ' id="' . $container_id . '"';
		if ( $container_class )
		  $fb_output .= ' class="' . $container_class . '"';
		$fb_output .= '>';
	      }
	      $fb_output .= '<ul';
	      if ( $menu_id )
		$fb_output .= ' id="' . $menu_id . '"';
	      if ( $menu_class )
		$fb_output .= ' class="' . $menu_class . '"';
	      $fb_output .= '>';
	      $fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
	      $fb_output .= '</ul>';
	      if ( $container )
		$fb_output .= '</' . $container . '>';
	      echo $fb_output;
	    }
	  }
	}
	function ttCreateNavigation($menu, $class) {
		wp_nav_menu(
			array(
				'theme_location' => $menu,
				'container'      => false,
				'depth'          => 2,
				'menu_class'     => $class,
				'fallback_cb'    => 'bootstrap-navwalker::fallback',
				'walker'         => new wp_bootstrap_navwalker()
			)
		);
	}
	add_action('display_navigation', 'ttCreateNavigation', 10, 2);	
};

/* DON'T DELETE THIS CLOSING TAG */ ?>
