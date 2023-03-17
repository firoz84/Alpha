<?php 
/**
 * Template Name: query page 
*/
    get_header();
?>
<?php get_template_part('hero');?>


<!--আমি যদি নিদিষ্ট কোনো পোস্ট দেখতে চাই তাহলে এই ভাবে কাজ করতে হবে -->

<div class="post-data">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <?php 
                $paged=get_query_var('paged') ? get_query_var('paged'): 1;
                $posts_par_page=2;
                $post_ids=array(39, 37, 35, 32,29);
                $_p=get_posts(array(
                    'post__in'=>$post_ids,
                    'posts_per_page'=>$posts_par_page,
                    'orderby'=>'post__in',
                    'paged'=>$paged

                ));

                //অবশই $post রাখতে হবে 

                foreach($_p as $post){
                    setup_postdata( $post );
                    ?>
                    <h1><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>

                    <?php the_post_thumbnail();?>
                    <?php
                    wp_reset_postdata();
                }
                ?>

            </div>
        </div>
    </div>
</div>

    
</div>
<!--pagination-->
    <div class="container post-pagination">
        <div class="row justify-content-center">
            
            <div class="col-md-8">
            <?php 
              echo paginate_links(array(

                'total' => ceil( count( $post_ids ) / $posts_per_page )
              ));
            
            ?>
            </div>
        </div>
    </div>

<?php 

get_footer();
?>