<?php          
if(get_theme_mod('md_related_order')) : 
    $orderby = get_theme_mod('md_related_order');
else :
    $orderby = 'rand';
endif; 
        
$orig_post = $post;
global $post;

$categories = get_the_category($post->ID);

if ($categories) {

	$category_ids = array();

	foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
	
	$args = array(
		'category__in'     => $category_ids,
		'post__not_in'     => array($post->ID),
		'posts_per_page'   => 5, // Number of related posts that will be shown.
		'ignore_sticky_posts' => 1,
		'orderby' => $orderby
	);

	$my_query = new wp_query( $args );
	if( $my_query->have_posts() ) { ?>
		<div class="post-related">
        
            <h2>
            
                <span class="related_heading">
                
                <?php if(get_theme_mod('md_change_text_related')) : ?>
                    <?php echo get_theme_mod('md_change_text_related'); ?>
                <?php else : ?>
                    <?php echo "Related:"; ?>
                <?php endif; ?>
                
                </span>
                
            </h2>   
            
            <div class="related_wrap">   
    		<?php while( $my_query->have_posts() ) {
    			$my_query->the_post();?>
    				<div class="item-related">
    					
    					<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
    					<a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('rectangle-thumb'); ?></a>
    					<?php endif; ?>
    					
    					<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
    					<?php if (get_theme_mod('md_show_date_related')) : ?> <span class="date"><?php the_time( get_option('date_format') ); ?></span><?php endif; ?>
    					
    				</div>
    		<?php
    		}
    		echo '</div></div> ';
	}
}
$post = $orig_post;
wp_reset_query();

?>