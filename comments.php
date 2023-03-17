

<div class="comments_number">

<h2>
   <?php 
    $alpha_cm=get_comments_number();
    if(1==$alpha_cm){
        _e('1 comments','alpha');

          }else{
            echo $alpha_cm.__(" comments", 'alpha');
          }
   
   
   ?>
</h2>
<div class="comment_list">
<?php 

wp_list_comments();
?>
</div>
<div class="comment_form">
    <?php
    comment_form();

    ?>
</div>


</div>