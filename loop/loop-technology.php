<?php /* Loop Name: Technology */ ?>

<?php
	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

	$full_description = get_field('full_description', $term);
	$image = get_field('image', $term);
?>

<section class="technology-section">

	<figure><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></figure>
	<div><?php echo $full_description; ?></div>
	
</section>
<div class="clear"></div>

<hr>

<h3>Manufactures</h3>

<ul class="logos">
<?php if (have_posts()) : ?>
	
	<?php 
	// Build an array of manufactures associated with the products under this technology
	$manufactures = array();
	while (have_posts()) {
		the_post();
		$terms = get_the_terms( $post->ID, 'manufacturer' );								
		if ( $terms && ! is_wp_error( $terms ) ) {
			foreach ( $terms as $term ) {				
				$manufactures[$term->slug] = get_field('logo', $term);
			}
		}
	} 
	?>
	
	<?php foreach($manufactures as $slug => $logo): ?>
		<li>			
			<a href="/manufacturer/<?php echo $slug; ?>">
				<img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
			</a>
		</li>
	<?php endforeach; ?>
	
<?php else: ?>

	<li>Sorry, no manufactures were found!</li>

<?php endif; ?>
</ul>