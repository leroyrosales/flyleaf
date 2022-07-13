<?php
/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

/**
 * If you are installing Timber as a Composer dependency in your theme, you'll need this block
 * to load your dependencies and initialize Timber. If you are using Timber via the WordPress.org
 * plug-in, you can safely delete this block.
 */
$composer_autoload = __DIR__ . '/vendor/autoload.php';
if ( file_exists( $composer_autoload ) ) {
    require_once $composer_autoload;
    $timber = new Timber\Timber();
}

/**
 * This ensures that Timber is loaded and available as a PHP class.
 * If not, it gives an error message to help direct developers on where to activate
 */
if ( ! class_exists( 'Timber' ) ) {

    add_action(
        'admin_notices',
        function() {
            echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
        }
    );

    add_filter(
        'template_include',
        function( $template ) {
            return get_stylesheet_directory() . '/static/no-timber.html';
        }
    );
    return;
}

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array( 'templates', 'views' );

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;


/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */
class StarterSite extends Timber\Site {
    /** Add timber support. */
    public function __construct() {
        add_action( 'after_setup_theme', array( $this, 'theme_supports' ) );
        add_filter( 'timber/context', array( $this, 'add_to_context' ) );
        add_filter( 'timber/twig', array( $this, 'add_to_twig' ) );
        add_action( 'init', array( $this, 'register_post_types' ) );
        add_action( 'init', array( $this, 'register_taxonomies' ) );
        add_action( 'init', array( $this, 'harrington_register_nav_menus' ) );
        parent::__construct();
    }
    /** This is where you can register custom post types. */
    public function register_post_types() {

    }
    /** This is where you can register custom taxonomies. */
    public function register_taxonomies() {

    }

  function harrington_register_nav_menus() {
    // This is where you register the custom menu LOCATIONS.
    register_nav_menus(
      array(
                'primary_menu' => __( 'Primary Menu', 'harrington' ),
                'footer_menu'  => __( 'Footer Menu', 'harrington' ),
                'mobile_menu'  => __( 'Mobile Menu', 'harrington' ),
            )
        );
    }

    /** This is where you add some context
     *
     * @param string $context context['this'] Being the Twig's {{ this }}.
     */
    public function add_to_context( $context ) {
        $context['primary_menu'] = new TimberMenu('primary_menu');
        if( has_nav_menu( 'footer_menu' ) ) {
            $context['footer_menu'] = new TimberMenu('footer_menu');
        }
        if( has_nav_menu( 'mobile_menu' ) ) {
            $context['mobile_menu'] = new TimberMenu('mobile_menu');
        }
        $context['site']  = $this;
        return $context;
    }

    public function theme_supports() {
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            )
        );

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support(
            'post-formats',
            array(
                'aside',
                'image',
                'video',
                'quote',
                'link',
                'gallery',
                'audio',
            )
        );

        add_theme_support( 'menus' );
    }

    /** This Would return 'foo bar!'.
     *
     * @param string $text being 'foo', then returned 'foo bar!'.
     */
    public function myfoo( $text ) {
        $text .= ' bar!';
        return $text;
    }

    /** This is where you can add your own functions to twig.
     *
     * @param string $twig get extension.
     */
    public function add_to_twig( $twig ) {
        $twig->addExtension( new Twig\Extension\StringLoaderExtension() );
        $twig->addFilter( new Twig\TwigFilter( 'myfoo', array( $this, 'myfoo' ) ) );
        return $twig;
    }

}

new StarterSite();

// Functions
require_once __DIR__ . '/functions/custom-post-types.php';
require_once __DIR__ . '/functions/customizer.php';
require_once __DIR__ . '/functions/custom-roles.php';
require_once __DIR__ . '/functions/disable-comments.php';
require_once __DIR__ . '/functions/enqueue.php';
require_once __DIR__ . '/functions/gravity-forms.php';
require_once __DIR__ . '/functions/taxonomy-functions.php';
require_once __DIR__ . '/functions/optimize-wp.php';
// require_once __DIR__ . '/functions/projects-options.php';
require_once __DIR__ . '/functions/shortcodes.php';
require_once __DIR__ . '/functions/sidebars.php';
require_once __DIR__ . '/functions/timber-context.php';
require_once __DIR__ . '/functions/timber-filters.php';

// After WordPress is Loaded
add_action(
    'wp_loaded',
    function () {
        require_once( __DIR__ . '/functions/acf.php' );
    },
    11
);

// Removes editor from Appearance and Plugin menu
function harrington_hide_editors() {
    remove_action( 'admin_menu', '_add_themes_utility_last', 101 );
    remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
};
add_action( '_admin_menu', 'harrington_hide_editors' );

function misha_loadmore_ajax_handler(){

    // prepare our arguments for the query
    $args = json_decode( stripslashes( $_POST['query'] ), true );
    $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
    $args['post_type'] = 'story';
    $args['post_status'] = 'publish';

    // it is always better to use WP_Query but not here
    query_posts( $args );

    if ( have_posts() ) :

        // run the loop
        while( have_posts() ): the_post();

            $numberOfWords = str_word_count( get_the_content() );

            // look into your theme code how the posts are inserted, but you can use your own HTML of course
            // do you remember? - my example is adapted for Twenty Seventeen theme
            // get_template_part( 'template-parts/post/content', get_post_format() );
            // for the test purposes comment the line above and uncomment the below one
            // the_title();
            echo '<section class="snap-y snap-mandatory min-h-screen flex flex-col justify-center py-10 md:py-0 bg-' . get_the_category()[0]->slug . '">
            <div class="arbc-container justify-center relative">
                <div class="category-icon icon-' . get_the_category()[0]->slug . '" role="presentation"></div>
                <h2 class="pt-12 md:pt-0 rotate-category">' . get_the_category()[0]->name . '</h2>
            </div>
            <div class="snap-start arbc-container justify-center relative h-full">
                <div class="pl-10 md:pl-0 flex flex-col">
                    <blockquote class="max-w-4xl '; 
                    echo $numberOfWords <= 75 ? 'short-story' : 'text-xl md:text-3xl';
                    echo '">
                        ' . get_the_content() . '
                    </blockquote>
                    <div class="md:text-right">
                        <figcaption class="pt-12"><strong>' . get_field( 'display_name' ) . '</strong></figcaption>';
                        if ( ! get_field( 'home_campus' ) === 'do_not_attend ') :
                            echo '<span>' . get_field( 'home_campus' ) . '</span>';
                        endif;
                    echo '
                    </div>
                </div>
            </div>
        </section>';


        endwhile;

    endif;
    die; // here we exit the script and even no wp_reset_query() required!
}

add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}
