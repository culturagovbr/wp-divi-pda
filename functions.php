<?php
// adicionando css que faz a função do divi custom css (Carrega por último)
function divi_child_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . '/assets/css/custom.css');
    wp_enqueue_style( 'alto-contraste', get_stylesheet_directory_uri() . '/assets/css/alto-contraste.css');
    wp_enqueue_script( 'alto-contraste', get_stylesheet_directory_uri() . '/assets/js/alto-contraste.js');
}

add_action( 'wp_head', 'divi_child_enqueue_styles' );

/**  * Inclui a funcionalidade do breadcrumb  */
// include ( get_stylesheet_directory() . '/includes/breadcrumb.php' );

/*$cron_jobs = get_option( 'cron' );
echo '<pre>';
var_dump($cron_jobs);
echo '</pre>';*/