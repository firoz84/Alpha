<?php
//acf er field required 
require_once get_theme_file_path('/inc/acf-functions.php');

function alpha_theme(){
    load_theme_textdomain('alpha');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support( 'html5', array( 'search-form' ) );
    $alpha_custom_header_details = array(
        'header-text'        => true,
        'default-text-color' => '#222',
        'width'              => 1200,
        'height'             => 600,
        'flex-height'        => true,
        'flex-width'         => true,
    );
    add_theme_support( "custom-header", $alpha_custom_header_details );

    $alpha_custom_logo_defaults = array(
        "width"  => '100',
        "height" => '100'
    );
    add_theme_support( "custom-logo", $alpha_custom_logo_defaults );

    add_theme_support("custom-background");

    register_nav_menu( "topmenu", __( "Top Menu", "alpha" ) );
    register_nav_menu( "footermenu", __( "Footer Menu", "alpha" ) );

    add_theme_support( "post-formats", array( "image", "quote", "video", "audio", "link" ) );

    add_image_size("alpha-square",400,400,true); //center center
    add_image_size("alpha-square-new1",401,401,array("left","top"));
    add_image_size("alpha-square-new2",500,500,array("center","center"));
    add_image_size("alpha-square-new3",600,600,array("right","center"));


    register_nav_menus( array(
        'primary_menu' => __( 'Primary Menu', 'alpha' ),
        'footer_menu'  => __( 'Footer Menu', 'alpha' ),
    ) );
}

add_action('after_setup_theme', 'alpha_theme');

// theme enqueue scripts
function alpha_script_enqueue(){
    
    wp_enqueue_style('bootstrap','//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-new','//cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">');
    wp_enqueue_style('deshicons');
    wp_enqueue_style('alpha', get_stylesheet_uri());

}
add_action('wp_enqueue_scripts', 'alpha_script_enqueue');


// widget registration function
function alpha_widget_init(){

    register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'alpha' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	) );
}

add_action('widgets_init', 'alpha_widget_init');



// add class to li 



function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'alpha_namespace_menu_item_class', 10, 3);



// custom header add kora
function alpha_custom_header(){

    if ( is_page() ) {
        $alpha_feat_image = get_the_post_thumbnail_url( null, "large" );
        ?>
        <style>
            .page-header {
                background-image: url(<?php echo $alpha_feat_image;?>);
            }
        </style>
        <?php
    }
    
    if(is_front_page()){
        if(current_theme_supports('custom-header')){
            ?>
            <style>
                .header{
                    background:url(<?php echo header_image();?>);
                    background-repeat:no-repeat;
                    background-size:cover;
                    margin-bottom:20px;
                }
            </style>
            <?php
        }
    }
}

add_action('wp_head','alpha_custom_header');



//body te class add and remove
function alpha_add_and_remove_classes($classes){
    unset($classes[array_search('first-class',$classes)]);
    unset($classes[array_search("single-format-audio", $classes)]);
    // class add 
    $classes[] = "firoz";
    return $classes;
}

add_filter('body_class', 'alpha_add_and_remove_classes',);

//post class add and remove

function alpha_post_class($classes){
    unset($classes[array_search("format-audio", $classes)]);
    return $classes;
}
add_filter("post_class","alpha_post_class");

// আমি  যদি blog page কোনো নিদিষ্ট post , tag er post or caterory post দেখতে চাই না।  তাহলে function.php  এই hook নিয়ে কাজ করতে হবে 

function alpha_post_class_pre_post($wpq){
    if(is_home() && $wpq->is_main_query()){
       // $wpq->set('post__not_in ', array(32));
        $wpq->set("tag__not_in", array(10));
    }

}

add_action('pre_get_posts', 'alpha_post_class_pre_post');


// ACF dashboard থেকে custom Fields নাম menu hide করার জন্য এই hoook ব্যবহার করা 

add_filter('acf/settings/show_admin', '__return_false');