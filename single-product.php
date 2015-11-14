<?php get_header(); ?>

<?php cherry_setPostViews(get_the_ID()); ?>
<div class="motopress-wrapper content-holder clearfix" id="product">
	<div class="container">
		<div class="row">
			<div class="<?php echo cherry_get_layout_class( 'full_width_content' ); ?>" data-motopress-wrapper-file="page-fullwidth.php" data-motopress-wrapper-type="content">
				<div class="row">
					<div class="<?php echo cherry_get_layout_class( 'full_width_content' ); ?> <?php echo of_get_option('blog_sidebar_pos'); ?>" id="content" data-motopress-type="loop" data-motopress-loop-file="loop/loop-single.php">
						<?php get_template_part("loop/loop-product"); ?>						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>