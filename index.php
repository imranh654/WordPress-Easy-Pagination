<?php
	$homepost = new WP_Query( array(
		'post_type'      => 'post',
		'posts_per_page' => 10,
		'paged' => get_query_var('paged') ? get_query_var('paged') : 1
	) );
?>


<?php if ( $homepost->have_posts() ) : ?>

	<div class="child-pages grid">
		<?php
		while ( $homepost->have_posts() ) : $homepost->the_post();
			get_template_part( 'components/post/content', 'grid' );
		endwhile;
		?>
	</div><!-- .child-pages .grid -->
				
				
	<div class="custom-paginate">
	    <?php
	    $big = 999999999; // need an unlikely integer
	     echo paginate_links( array(
		'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
		'format' => '?paged=%#%',
		'prev_text'          => __('Previous'),
		'next_text'          => __('Next'),
		'current' => max( 1, get_query_var('paged') ),
		'total' => $homepost->max_num_pages
	    ) ); ?>
    	</div>

<?php endif;
	wp_reset_postdata();
?>
