<?php 
    get_header();
?>
<?php get_template_part('hero');?>

 <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
        <h1>
        Posts In
        <?php
        if(is_month()){
            $month = get_query_var("monthnum");
            $dateobj = DateTime::createFromFormat("!m",$month);
            echo $dateobj->format("F");
        } else if(is_year()){
            echo esc_html(get_query_var("year"));
        } else if(is_day()){
            $day = esc_html(get_query_var("day"));
            $month = esc_html(get_query_var("monthnum"));
            $year = esc_html(get_query_var("year"));
            printf("%s/%s/%s",$day,$month,$year);
        }

        ?>

    </h1>
        </div>
    </div>
 </div>

<div class="posts">
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
   
    
</div>
<?php get_footer(); ?>
    

    
</div>
<!--pagination-->
    <div class="container post-pagination">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
            <?php 
                // the_posts_pagination(array(
                //     'screen_reader_text'=>' ',
                //     'prev_text'=>'new post',
                //     'next_text'=>'next post'
                // ));
            
            ?>
            </div>
        </div>
    </div>

<?php 

get_footer();
?>