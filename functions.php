<?php 

    // Load StyleSheets
    function load_css()
    {
        wp_register_style('main', get_template_directory_uri() . '/dist/css/app.css', array(), false, 'all');
        wp_enqueue_style('main');
        
        wp_register_style('lightbox', get_template_directory_uri() . '/dist/css/LightBox.css', array(), false, 'all');
        wp_enqueue_style('lightbox');

    }

    add_action('wp_enqueue_scripts', 'load_css');

    // Load StyleSheets for admin area
    function load_admin_style()
    {
        wp_register_style( 'admin_css', get_template_directory_uri() . '/dist/css/admin_styles.css', false, 'all' );
        wp_enqueue_style('admin_css');
    }
    add_action('admin_enqueue_scripts', 'load_admin_style');

    // Load javaScripts
    function load_js()
    {
        wp_enqueue_script('jquery');
        
        wp_register_script('bootstrap', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.min.js', 'jquery', false, true);
        wp_enqueue_script('bootstrap');

        wp_register_script('main', get_template_directory_uri() . '/dist/js/app.js', 'jquery', false, true);
        wp_enqueue_script('main');
        
        if(is_page('55') || is_page('73')) {
            wp_register_script('lightbox', get_template_directory_uri() . '/dist/js/LightBox.js', 'jquery', false, true);
            wp_enqueue_script('lightbox');
        }
        

        wp_register_script('scrollreveal', 'https://unpkg.com/scrollreveal', 'jquery', false, true);
        wp_enqueue_script('scrollreveal');

        wp_register_script('scrollanimation', get_template_directory_uri() . '/dist/js/scrollAnimation.js', 'jquery', false, true);
        wp_enqueue_script('scrollanimation');
    }

    add_action('wp_enqueue_scripts', 'load_js');

    // Theme Options
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    add_theme_support( 'html5', 'gallery' );

    // Multiple Post Thumbnail
    if (class_exists('MultiPostThumbnails')) {
        $types = array('post', 'page', 'my_post_type');
        foreach($types as $type) {
            $thumb = new MultiPostThumbnails(array(
                'label' => 'Secondary Image',
                'id' => 'secondary-image',
                'post_type' => $type
                )
            );
        }
    }

    // Register Menus
    register_nav_menus(
        array(
            'top-menu' => 'Top Menu Location',
            'sub-menu' => 'Sub Page Menu Location'
        )
    );

    //Register Custom Navigation Walker
    function register_navwalker()
    {
    	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
    }
    add_action( 'after_setup_theme', 'register_navwalker' );

    // Custom Image Sizes
    add_image_size('img-large', 600, 400, true);
    add_image_size('img-small', 300, 200, true);

    // Get attachment meta
    function wp_get_attachment( $attachment_id ) {

        $attachment = get_post( $attachment_id );
        return array(
            'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
            'caption' => $attachment->post_excerpt,
            'description' => $attachment->post_content,
            'href' => get_permalink( $attachment->ID ),
            'src' => $attachment->guid,
            'title' => $attachment->post_title
        );
    }

    // Custom Logo setup
    function kbPage_custom_logo_setup()
    {
        $defaults = array(
            'height' => 100,
            'width' => 177,
            'flex-height' => false,
            'flex-width' => false,
            'header-text' => array('logo')
        );
        add_theme_support('custom-logo', $defaults);
    }
    add_action('after_setup_theme', 'kbPage_custom_logo_setup');

    // change custom logo classes
    add_filter('get_custom_logo', 'change_logo_classes');
    
    function change_logo_classes($html)
    {
        $html = str_replace('custom-logo-link', 'navbar-brand', $html);
        $html = str_replace('custom-logo', 'logo', $html);

        return $html;
    }
    
    // Prevent WP from adding <p> tags on all post types
    remove_filter('the_content', 'wpautop');

    // Register Footer Settings
    function kbPage_admin_init()
    {
        register_setting('kbPage_theme_footer_options', 'kbPage_footer_city');
        register_setting('kbPage_theme_footer_options', 'kbPage_footer_street');
        register_setting('kbPage_theme_footer_options', 'kbPage_footer_phoneNr');
    }

    add_action('admin_init', 'kbPage_admin_init');

    function kbPage_settings_page()
    {
        ?>
<div class="wrap">
    <h2>Ustawienia Stopki</h2>
    <h4>Na tej stronie możesz ustawić dane kontaktowe wyświetlane w stopce strony.</h4>
    <form action="options.php" method="post" id="kbPage-options-form">
        <?php settings_fields('kbPage_theme_footer_options');?>
        <h3 class='form_wrap'>
            <label for="kbPage_footer_city">Miasto
                <input type="text" name="kbPage_footer_city" id="kbPage_footer_city"
                    value="<?php echo esc_attr(get_option('kbPage_footer_city')); ?>" />
            </label>
            <label for="kbPage_footer_street">Ulica
                <input type="text" name="kbPage_footer_street" id="kbPage_footer_street"
                    value="<?php echo esc_attr(get_option('kbPage_footer_street')); ?>" />
            </label>
            <label for="kbPage_footer_phoneNr">Telefon
                <input type="text" name="kbPage_footer_phoneNr" id="kbPage_footer_phoneNr"
                    value="<?php echo esc_attr(get_option('kbPage_footer_phoneNr')); ?>" />
            </label>
        </h3>
        <input type="submit" class="btn btn-primary" value="zapisz" />
    </form>
</div>

<?php 
    }

    function kbPage_settings_menu()
    {
        add_theme_page('Footer Settings', 'Footer', 'manage_options', 'kbpage-footer-options', 'kbPage_settings_page' );
    }
    add_action('admin_menu', 'kbPage_settings_menu');

    // Remove WP Gallery inline style
    add_filter( 'use_default_gallery_style', '__return_false' );
  
?>