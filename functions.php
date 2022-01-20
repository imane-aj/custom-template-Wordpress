<?php 
//add website titleamespace App;
function myWebSite_title_support(){
    add_theme_support( 'title-tag' );
    //add_image_size( 'card-header', 500, 208, true );
}
add_action( 'after_setup_theme','myWebSite_title_support' );

//add title separator
function mysite_title_separator(){
    return '|';
}
add_filter( 'document_title_separator','mysite_title_separator' );

// add styles and fonts used in our site
function add_styles() {
 // wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/css/bootstrap.min.css');
  wp_enqueue_style( 'bootsrap','https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' );
  wp_enqueue_style('main-css', get_template_directory_uri().'/css/main.css');
  wp_enqueue_style( 'font-awesome','https://maxcdn.bootstrapcdn.com/font-awesome/5.4.0/css/font-awesome.min.css' );
  wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.5.0/css/all.css' );
}

//add  the action to make the function works
add_action('wp_enqueue_scripts', 'add_styles');

 //add scripts 
function add_scripts() {
//remore registration for old jquery
wp_deregister_script('jquery');

//register new jquery in the footer
//wp_register_script('jquery',includes_url('/js/jquery/jquery.js'), false,'',true);
wp_register_script( 'jquery','https://code.jquery.com/jquery-3.5.1.slim.min.js', [],false,true );
//enqueue the new jquery
wp_enqueue_script('jquery');

//add bootstrap file script
//wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.min.js',array('jquery'),false,true);
wp_enqueue_script( 'js','https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js', ['popper','jquery'],false,true );
wp_enqueue_script( 'popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js', [],false,true );
//add main file script
wp_enqueue_script('main-js', get_template_directory_uri().'/js/main.js',array(),false,true);

//add html5shiv for old browser
wp_enqueue_script('html5shiv', get_template_directory_uri().'/js/htmlshiv.js');

//add conditional comment for html5shiv
wp_script_add_data('html5shiv','conditional','lt IE 9');

//add respond script for old browser
wp_enqueue_script('respond', get_template_directory_uri().'/js/respond.min.js');

//add conditional comment for respond
wp_script_add_data('respond','conditional','lt IE 9');
}

//add  the action to make the function works
add_action('wp_enqueue_scripts', 'add_scripts');

//include nav walker class for bootstrap nav menu
include_once('wp-bootstrap-navwalker.php');

// register a new menu
function register_custom_menus() {
register_nav_menus(array(
   'main-menu'   => 'Main menu',
   'footer-menu' => 'footer menu'
));
}
function bootstrap_menu() {
wp_nav_menu(array(
'theme_location' =>  'main-menu',
'menu_class'     =>  'nav navbar-nav ml-auto',
'container'      =>  false,
'depth'          =>  2,
'walker'         => new wp_bootstrap_navwalker()
));
}
//
add_action('init', 'register_custom_menus');

//add feature img suport
add_theme_support('post-thumbnails');

//customize the excerpt word length and read more dots
function extend_excerpt_length($length){
if( is_author() ){
   return 20;
}else{
return 55;
}
}

add_filter('excerpt_length', 'extend_excerpt_length');

function excerpt_change_dots($more){
return "{...}";
}

add_filter('excerp_more','excerpt_change_dots');

// sidebar\\
function main_sidebar(){
register_sidebar(array(
'name'               =>  'main sidebar',
'id'                 =>  'main-sidebar',
'description'        =>  'main sidebar appear everywhere',
'class'              =>  'main-sidebar',
'before_widget'      =>  '<div class="widget-content">',
'after_widget'       =>  '</div>',
'before_title'       =>  '<h3 class="widget-title">',
'after_title'        =>  '</h3>'
) );
}
add_action('widgets_init','main_sidebar');
?>