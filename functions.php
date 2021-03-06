<?php
// adicionando css que faz a função do divi custom css (Carrega por último)
function divi_child_enqueue_styles() {
    // wp_enqueue_style( 'open-sans-font', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' );
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . '/assets/css/custom.css');
    wp_enqueue_style( 'alto-contraste', get_stylesheet_directory_uri() . '/assets/css/alto-contraste.css');
    wp_enqueue_script( 'alto-contraste', get_stylesheet_directory_uri() . '/assets/js/alto-contraste.js');
    wp_enqueue_script( 'pdfmake', get_stylesheet_directory_uri() . '/assets/js/pdfmake.min.js');
    wp_enqueue_script( 'vfs_fonts', get_stylesheet_directory_uri() . '/assets/js/vfs_fonts.js');
    wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.js');

    $pdaJSObj = array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'post_id' => get_the_ID(),
        'post_name' => get_the_title( get_the_ID() ),
    );

    wp_localize_script( 'scripts', 'pdaJSObj', $pdaJSObj );
}

add_action( 'wp_head', 'divi_child_enqueue_styles' );

// Insere um link para fazer o download da página no formato PDF
function add_pdf_download_link($content){
    if( is_page() && is_main_query() ) {
        $new_content = '<a href="#" class="download_as_pdf"><img src="' . get_stylesheet_directory_uri() .'/assets/img/pdf-icon.png">Baixar como PDF</a>';
        $content .= $new_content;   
    }   
    return $content;
}
add_filter('the_content', 'add_pdf_download_link', 99);