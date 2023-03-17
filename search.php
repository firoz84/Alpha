<?php 
    get_header();
?>
<?php get_template_part('hero');?>



<div class="posts text-center">
    <?php 
    
    if(!have_posts()) {
       ?>
       <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1><?php _e('it has no result in here','alpha');?></h1>
            </div>
        </div>
       </div>
       <?php
    }
    ?>


    <?php
    $agrs=array(
        'post_type'=>'post'
    );
        $query= new WP_Query($agrs);
    while ( $query->have_posts() ) {
        $query-> the_post();
        get_template_part("post-formats/content",get_post_format());
    }
    ?>

    <div class="container post-pagination">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <?php
                the_posts_pagination( array(
                    "screen_reader_text" => ' ',
                    "prev_text"          => "New Posts",
                    "next_text"          => "Old Posts"
                ) );
                ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
    

    
</div>
<!--pagination-->
    <div class="container post-pagination">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
            <?php 
                the_posts_pagination(array(
                    'screen_reader_text'=>' ',
                    'prev_text'=>'new post',
                    'next_text'=>'next post'
                ));
            
            ?>
            </div>
        </div>
    </div>

<?php 

get_footer();
?>