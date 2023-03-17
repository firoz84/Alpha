<?php 
/**
 * Template Name:Post Format 
*/
    get_header();
?>
<?php get_template_part('hero');?>




<div class="post-data">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <?php 
                
                // post-format  অনুসারে post দেখতে চাই তাহলে এভাবে query করতে হবে 

              $paged=get_query_var('paged') ? get_query_var('paged'): 1;
                $posts_par_page=2;
                $post_ids=array(39, 37, 35, 32, 29, 1);
                $_p=new WP_Query(array(
                    // 'category_name' => 'new',
                    // 'tag'=>'firoz',
                   // 'post__in'=>$post_ids,
                 'posts_per_page'=>$posts_par_page,
                  'tag_query'=>array(
                    'relation' => 'OR',
                    array(
                        'taxsomy'=>'post_format',
                        'field' => 'slug',
                        'terms'=>array(

                            'post-format-audio'
                        )
                    ),
                   

                    ),
                 
                    'paged'=>$paged

                ));

                

                while($_p->have_posts()){
                    $_p->the_post();
                    ?>
                    <h1><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>

                  
                    <?php
                   wp_reset_query();
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

                'total'=>$_p->max_num_pages,
                'current'=>$paged,
                'prev_text'=>__('old','alpha'),
                'next_text'=>__('next','alpha'),
              ));
            
            ?>
            </div>
        </div>
    </div>

<?php 

get_footer();
?>