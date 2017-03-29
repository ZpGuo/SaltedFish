<?php
/**
 * @name SaltedFish-functions
 * @description SaltedFish theme functions file
 * @version     1.0.0
 * @author      锅子(https://www.gzpblog.com)
 * @package     SaltedFish
 **/

/**
 * Define constants
 */
define( 'SF_NAME', 'SaltedFish' );
define( 'SF_VERSION', '1.0.0' );
define( 'SF_PATH', dirname( __FILE__ ) );
define( "SF_THEME_URL", get_bloginfo( 'template_directory' ) );

/**
 * 导入主题核心文件
 */
get_template_part( 'functions/sf-basic' );
get_template_part( 'functions/sf-define' );
get_template_part( 'functions/sf-functions' );
get_template_part( 'functions/sf-widget' );

/*
 * 加载js,css文件
 * */
function sf_scripts_with_jquery()
{
    //main css
    wp_enqueue_style( 'style', get_bloginfo( 'stylesheet_url' ), $deps = array(), SF_VERSION  );
    // 导航菜单 css
    wp_register_style( 'navi', get_template_directory_uri() . '/public/css/bootstrap-off-canvas-nav.css' );
    wp_enqueue_style( 'navi' );
    //顶部loading css
    wp_register_style( 'pace', get_template_directory_uri() . '/public/css/pace-theme-flash.css' );
    wp_enqueue_style( 'pace' );


    //JQuery js
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', sf_script( 'jquery.min.js' ), false, '1.11.3' );
    wp_enqueue_script( 'jquery', false, false, '1.11.3' );
    // bootstrap js
    wp_register_script( 'custom-script', get_template_directory_uri() . '/public/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '3.3.7' );
    wp_enqueue_script( 'custom-script' );
    // 导航菜单 js
    wp_enqueue_script( 'nav_js', sf_script( 'bootstrap-off-canvas-nav.js' ), null, SF_VERSION, false );
    //顶部loading js
    wp_enqueue_script( 'pace_js', sf_script( 'pace.min.js' ), null, SF_VERSION, false );

}
add_action( 'wp_enqueue_scripts', 'sf_scripts_with_jquery' );


/**
 * 注册导航菜单
 */
register_nav_menus( array(
    'header_menu' => '顶部导航菜单', //注册顶部导航菜单key为header_menu; 在顶部导航处调用该key,如果用户选择了就能正常显示
) );

/** 侧边栏组件widgets注册(使主题支持侧边栏) */
if( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => 'SaltedFish-sidebar',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}

add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
    remove_action('wp_head','_admin_bar_bump_cb');
}