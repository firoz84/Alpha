<?php 

single_cat_title();
//->কোনো টার্ম থাকলে term return করবে। কোনো পোস্ট থাকলে পোস্ট return করবে 
$alpha_current_term= get_queried_object();

$alpha_thumbnail_id=get_field('thumbnail',$alpha_current_term);
$image_id=wp_get_attachment_image_src( $alpha_thumbnail_id);

echo '<br><img src="'. esc_url($image_id[0]).'">';
