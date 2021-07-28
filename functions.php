<?php //子テーマ用関数
if ( !defined( 'ABSPATH' ) ) exit;

add_filter('wp_header_logo_after_open', 'add_header_contents');
function add_header_contents() {  
  global $template;
  if(basename($template)==='portfolio.php'){
    get_template_part('tmp/navi-portfolio'); 
  }
}

function cooocn_child_setup_theme() {
  register_nav_menus([
    'portfolio-navi' =>  'portfolio Navigation',
    'portfolio-navi-mobile' => 'portfolio SP Navigation' 
  ]);
}



add_action( 'wp_print_styles', 'load_dashicons');
function load_dashicons() {
	if ( is_page() ) wp_enqueue_style('dashicons');
}

add_action( 'after_setup_theme', 'cooocn_child_setup_theme' );