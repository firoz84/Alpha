
<?php 
$alpha_sidebar='col-md-8';
if(!is_active_sidebar('sidebar-1')){
    $alpha_sidebar='col-md-10 offset-md-1';
}

    get_header();
?>
<?php get_template_part('hero');?>
<div class="posts" >
    <div class="container">
    <div class="row justify-content-center">
    <div class="<?php echo $alpha_sidebar;?>">
  
    
        <div class="post" <?php post_class();?>>
        <div class="container">

            <div class="row justify-content-center">
                
                    

                   
              
                    <h2 class="post-title text-center">
                        
                        <?php the_title();?>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 text-center">
                    <p>
                    <em><?php the_author_posts_link(); ?></em><br/>
                        <?php echo get_the_date();?>
                    </p>
                    <?php echo get_the_tag_list('<ul class="list-unstyled"><li>', '</li><li>', '</li></ul>' );?> 
                </div>
                <div class="col-md-12 text-center">
                    <p>
                       <?php 
                       if(has_post_thumbnail()){
                        the_post_thumbnail('large', array('class' => 'img-fluid'));
                       }
                       ?>
                    </p>
                    <?php 
                     the_content();
                    ?>


                   <hr>



                   <!-- ACF দিয়ে raletonship field এর মাধ্যমে raleted post নিয়ে কাজ করা  -->
                   <?php 
                   if(function_exists('the_field')):
                   ?>
                   <div>
                    <h1><?php _e('Raleted Posts', 'alpha');?></h1>
                    <?php 
                    $related_posts= get_field('raleted_post');
                    $posts=new WP_Query(array(
                            'post__in' => $related_posts,
                            'orderby' =>'post__in'

                    ));
                    while( $posts->have_posts()){
                        $posts->the_post();
                        ?>
                        <h2><?php the_title();?></h2>
                        <?php
                        wp_reset_query();
                    }
                    
                    ?>
                    </div>
                   <?php endif;?>



                       
                    
                    <!-- saw the next post or privius post -->
                  <?php 
                    next_post_link();
                    echo "</br>";
                    previous_post_link();
                  
                  ?>
                  
                
                </div>
                <div class="user-area pb-5">
                    <div class="avater-img">
                        <!--author er image poyer jonno-->
                        <div class="img">
                            <?php 
                            echo get_avatar(get_the_author_meta('ID'));
                            ?>
                        </div>
                        <div class="text-area">
                            <h4><?php echo get_the_author_meta( "display_name" ); ?>Firoz mahmud</h4>
                            <p><?php echo get_the_author_meta( "description" ); ?>
                            Plugins may add additional fields to the user profile, which in turn adds new key/value pairs to the wp_usermeta database table. This additional data can be retrieved by
                        </p>
                      </div>
                      <br>
                      <div class="user_id">

                      <!--user admin ডাটা তুলে আনার জন্য এই ভাবে কাজ করতে হবে ACF-->
                      <?php 
                        if(function_exists('the_field')){
                            ?>
                             <p>
                                Facebook : <?php the_field('facebook',get_the_author_meta('ID'));?><br>
                              
                             </p>
                             <p> 
                                 Twitter : <?php the_field('twitter',get_the_author_meta('ID'));?>
                            </p>
                            <?php
                        }
                        
                        ?>
                      </div>
        </div>
                </div>
                
                  <?php 
                if(comments_open()){
                        ?>
                        <div class="colmd-10 offset_md_1">
                            <?php 
                             comments_template();
                            ?>
                        </div>
                        <?php
                }
                    ?> 

              
            </div>

        </div>
       
    </div>
                        

    </div>
    <?php if(is_active_sidebar('sidebar-1')):?>
    <div class="col-md-4">
        <?php 
        if(is_active_sidebar('sidebar-1')){
            dynamic_sidebar('sidebar-1');

        }
        
        ?>

    </div>
    <?php endif;?>
    </div>
    </div>


    

    
</div>


<?php 
get_footer();

?>