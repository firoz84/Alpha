<?php 
    get_header();
?>
<?php get_template_part('hero');?>



<div class="posts text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-2">
                <?php 
                echo get_avatar(get_the_author_meta('ID'));
                ?>
            </div>
            <div class="col-lg-10">
               <h1> <?php 
                echo get_the_author_meta('display_name');
                ?></h1>
                <p>
                    <?php echo get_the_author_meta('description');?>
                </p>
            </div>
        </div>
    </div>



    <?php
    $agrs=array(
        'post_type'=>'post'
    );
        $query= new WP_Query($agrs);
    while ( $query->have_posts() ) {
        $query-> the_post();
        ?>
         <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="post-title">
                    <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                </div>
            </div>
        </div>
    </div>
        <?php
       
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