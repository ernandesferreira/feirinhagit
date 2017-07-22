<?php
	
if( isset( $_GET['debug'] ) ){
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
}

require_once 'cpt.php';
require_once 'cron.php';
require_once __DIR__ . '/../ajax/stands.php';

add_image_size( 'custom-thumb', 127, 67, array( 'center', 'center' ) ); // Hard crop left top

	// CSS and JS files for the site
function enqueue_styles_scripts() {

    // /* CSS */
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/font/font-awesome-4.6.3/css/font-awesome.min.css');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css');
    wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/lib/OwlCarousel2-2.2.1/assets/owl.carousel.min.css');
    wp_enqueue_style('owl-carousel2', get_template_directory_uri() . '/assets/lib/OwlCarousel2-2.2.1/assets/owl.theme.default.min.css');
    wp_enqueue_style('owl-carousel3', get_template_directory_uri() . '/assets/lib/OwlCarousel2-2.2.1/assets/owl.theme.green.min.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css?t'.time());

    // /* JS */
    wp_enqueue_script( 'bootstrap-js', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ) );
    wp_enqueue_script( 'owl-carousel-js', get_stylesheet_directory_uri() . '/assets/lib/OwlCarousel2-2.2.1/owl.carousel.min.js', array( 'jquery' ) );
    wp_enqueue_script( 'mask-js', get_stylesheet_directory_uri() . '/assets/js/mask.js', array( 'jquery' ) );
    wp_enqueue_script( 'trii-mask', get_stylesheet_directory_uri() . '/assets/js/trii-mask.js', array( 'jquery', 'mask-js' ) );

    // // sweetalert
    wp_enqueue_style( 'sweetalert2', get_template_directory_uri() . '/assets/lib/sweetalert2/sweetalert2.min.css' );
    wp_enqueue_script( 'sweetalert2', get_stylesheet_directory_uri() . '/assets/lib/sweetalert2/sweetalert2.min.js', null );
    wp_enqueue_script( 'promise', get_template_directory_uri() . '/assets/lib/sweetalert2/es6-promise.min.js', null );

    // // select2
    wp_enqueue_script( 'select2', get_template_directory_uri() . '/assets/lib/select2/select2.min.js', null );
    wp_enqueue_script( 'select2lang', get_stylesheet_directory_uri() . '/assets/lib/select2/select2_locale_pt-BR.js', null );

    // // DatePicker
    wp_enqueue_script( 'datepicker', get_template_directory_uri() . '/assets/lib/datepicker/js/bootstrap-datepicker.js', array( 'jquery' ) );
    wp_enqueue_script( 'datepickerlang', get_template_directory_uri() . '/assets/lib/datepicker/locales/bootstrap-datepicker.pt-BR.min.js', array( 'jquery' ) );
    wp_enqueue_style('datepicker-css', get_template_directory_uri() . '/assets/lib/datepicker/css/datepicker.css');

    // //jQuery Ui
    /*wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/assets/lib/jquery-ui/jquery-ui.min.js', array( 'jquery' ) );
    wp_enqueue_style('jquery-ui-css', get_template_directory_uri() . '/assets/lib/jquery-ui/base.css');    */

    wp_enqueue_script( 'functions-js', get_stylesheet_directory_uri() . '/assets/js/functions.js', array( 'jquery' ) );
    wp_enqueue_script( 'main-js', get_stylesheet_directory_uri() . '/assets/js/main.js', array( 'jquery' ) );

    // Singles

    if( is_singular( 'stand' ) ){
        wp_enqueue_script( 'stand-js', get_stylesheet_directory_uri() . '/assets/js/single-stand.js', array( 'jquery' ) );
    }

    // Incluir JS somente para os templates
    $template_directory_content = explode('/wp-content/',get_template_directory());
    $template_directory_content = 'wp-content/'.$template_directory_content[1];
    foreach (glob($template_directory_content."/assets/js/*.js") as $filename){

        if( strstr($filename, 'template-') ){

            $template = basename($filename);
            $template = str_replace('.js', '.php', $template);
            if( is_page_template( 'redesign/' . $template ) ){
                $js_name = str_replace('.','_',basename($filename));

                wp_enqueue_script( $js_name, get_stylesheet_directory_uri() . '/assets/js/'.basename($filename), array( 'jquery' ) );
            }
        }
    }

    // Incluir CSS somente para os templates
    $template_directory_content = explode('/wp-content/',get_template_directory());
    $template_directory_content = 'wp-content/'.$template_directory_content[1];
    foreach (glob($template_directory_content."/assets/css/*.css") as $filename){
        if( strstr($filename, 'template-') ){

            $template = basename($filename);
            $template = str_replace('.css', '.php', $template);
            if( is_page_template( 'redesign/' . $template ) ){
                $css_name = str_replace('.','_',basename($filename));

                wp_enqueue_style( $css_name, get_stylesheet_directory_uri() . '/assets/css/'.basename($filename) );
            }
        }
    }
}

if (!is_admin()) {
    add_action('wp_enqueue_scripts', 'enqueue_styles_scripts');
}
