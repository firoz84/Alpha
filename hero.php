<div class="header page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="tagline"><?php bloginfo('description');?></h3>
                <h1 class="align-self-center display-1 text-center heading">
                    <a href="<?php echo site_url();?>"><?php bloginfo('name');?></a>
                </h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="header-menu text-center">
            <?php
            wp_nav_menu(array(
                'theme_location' =>'primary_menu',
                'menu_class' =>'top-menu text-center',
                'menu_id' =>'top-menu',
                'add_li_class'=>'list-inline-item'

            ));
            ?>
        </div>
    </div>
</div>
<div class="search-area">
    <div class="row">
        <div class="col-lg-12 text-center">
            <?php 
            if(is_search()){
                ?>
                <h1>Search For : <?php the_search_query();?></h1>
                <?php
            }
            ?>
            <?php 
            echo get_search_form();
            
            ?>
        </div>
    </div>
</div>