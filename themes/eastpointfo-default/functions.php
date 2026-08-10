<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$understrap_includes = array(
    '/theme-settings.php',                  // Initialize theme default settings.
    '/setup.php',                           // Theme setup and custom theme supports.
    '/widgets.php',                         // Register widget area.
    '/enqueue.php',                         // Enqueue scripts and styles.
    '/template-tags.php',                   // Custom template tags for this theme.
    '/pagination.php',                      // Custom pagination for this theme.
    '/hooks.php',                           // Custom hooks.
    '/extras.php',                          // Custom functions that act independently of the theme templates.
    '/customizer.php',                      // Customizer additions.
    '/custom-comments.php',                 // Custom Comments file.
    '/jetpack.php',                         // Load Jetpack compatibility file.
    '/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
    '/woocommerce.php',                     // Load WooCommerce functions.
    '/editor.php',                          // Load Editor functions.
    '/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
    $filepath = locate_template( 'inc' . $file );
    if ( ! $filepath ) {
        trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
    }
    require_once $filepath;
}


add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );
function understrap_remove_scripts() {
    wp_dequeue_script( 'understrap-scripts' );
    wp_dequeue_style( 'understrap-styles' );
    
    remove_filter( 'excerpt_more', 'understrap_custom_excerpt_more' );
    remove_filter( 'wp_trim_excerpt', 'understrap_all_excerpts_get_more_link' );
}


add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'material-icons', '//fonts.googleapis.com/icon?family=Material+Icons' );
	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'theme-styles', get_stylesheet_directory_uri() . '/css/theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'theme-scripts', get_stylesheet_directory_uri() . '/js/production.min.js', array(), $the_theme->get( '1.1.2' ), true );

    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
    add_image_size( 'block-thumb', 286, 286, true ); // (cropped)
    add_image_size( 'post-thumb', 328, 164, true ); // (cropped)
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

// Footer Widgets
function tse_widgets_init() {

    register_sidebar( array(
        'name'          => 'Footer Bottom Right Widget Area',
        'id'            => 'footer-bottom-widget-area-right',
        'before_widget' => '<div class="footer-bottom-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

}
add_action( 'widgets_init', 'tse_widgets_init' );


// Social Widget
function tse_news_register_widget() {
    register_widget( 'tse_social_widget' );
}
add_action( 'widgets_init', 'tse_news_register_widget' );


class tse_social_widget extends WP_Widget {

    function __construct() {

        parent::__construct(

            'tse_social_widget',

            __('Social Icons', ' tse_widget_domain'),

            array( 'description' => __( 'Display Social Icons', 'tse_widget_domain' ), )

        );

    }

    public function widget( $args, $instance ) {

        $title = apply_filters( 'widget_title', $instance['title'] );
        $number = $instance['number'];

        echo $args['before_widget'];

        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }
        $widget_id = 'widget_' . $args['widget_id'];

        //if title is present
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
        ?>

        <div class="sf-social-icons">
            <?php
            if( have_rows('social_profiles', $widget_id) ): ?>
                <?php
                while ( have_rows('social_profiles', $widget_id) ) : the_row(); ?>
                    <?php
                    $sf_social_icon = get_sub_field('sp_social_icon');
                    $socialclass = str_replace(' ', '-', get_sub_field('sp_social_profile')); // Replaces all spaces with hyphens.
                    $socialclass = preg_replace('/[^A-Za-z0-9\-]/', '', $socialclass); // Removes special chars.
                    $socialclass = strtolower($socialclass); // Convert to lowercase
                    if (get_sub_field('sp_social_link')) :
                    ?>
                        <a class="<?php echo $socialclass; ?>" href="<?php echo esc_url(get_sub_field('sp_social_link')); ?>" target="_blank" rel="noreferrer noopener" aria-label="<?php echo get_field('sp_social_profile'); ?>">
                    <?php endif ?>
                            <?php if ($sf_social_icon): ?>
                                <?php echo $sf_social_icon; ?>
                            <?php endif ?>
                    <?php if (get_sub_field('sp_social_link')) : ?>
                        </a>
                    <?php endif ?>
                <?php
                endwhile; ?>
            <?php
            endif;  ?>
        </div>

        <?php
        echo $args['after_widget'];

    }

    public function form( $instance ) {

        if ( isset( $instance[ 'title' ] ) )

        $title = $instance[ 'title' ];

        ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

    <?php

    }

    public function update( $new_instance, $old_instance ) {

        $instance = array();

        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

        return $instance;

    }

}

//Advanced Custom Fields Options    
if( function_exists('acf_add_options_page') ) {
acf_add_options_page();
}

// Tse Excerpt More
function tse_excerpt_more($more) {
    $more = '...';
    return $more;
}
add_filter('excerpt_more', 'tse_excerpt_more');
add_filter( 'acf/the_field/escape_html_optin', '__return_true' );


// Exclude certain pages from WordPress search results
function tse_search_filter( $query ) {
    if ( ! $query->is_admin && $query->is_search && $query->is_main_query() ) {
      $query->set( 'post__not_in', array( 2771, 2707, 2300, 2290, 2065, 2001, 1979, 1721) );
    }
  }
  add_action( 'pre_get_posts', 'tse_search_filter' );

// Preload all CSS files
function tse_stylesheet_preload_filter( $html, $handle, $href, $media ) {
    // write_log($handle);
    $excludes = array('theme-styles');
    if ( !in_array($handle, $excludes) ) {
        $html = '<link rel="preload" as="style" href="' . $href . '" media="' . $media . '" onload="this.onload=null;this.rel=\'stylesheet\'">' . '<noscript>' . $html . '</noscript>';
    }

    return $html;
}
add_filter( 'style_loader_tag',  'tse_stylesheet_preload_filter', 999, 4 );

// Specify preload image with fetchpriority="high"
function tms_frontpage_fetchpriority_image() {
	if ( is_front_page() ) {
		$uploads = wp_upload_dir();
		echo '<link rel="preload" fetchpriority="high" as="image" href="' . $uploads['baseurl'] . '/Hero-2-1.webp">';
	}
}
add_action( 'wp_head', 'tms_frontpage_fetchpriority_image' );
