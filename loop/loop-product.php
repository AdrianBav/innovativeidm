<?php /* Loop Name: Product */ ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
    <?php 
        $model_number = get_field('model_number');
        $photo = get_field('photo');
        $details = get_field('details');
        $references = get_field('references');
        $related_products = get_field('related_products');
    ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('post__holder'); ?>>
       
        <section class="product-section">
            
            <?php if ( ! empty($photo) ): ?>
            <figure><img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>"></figure>
            <?php endif; ?>

            <div>
                <h1><?php echo get_the_title(); ?></h1>
                <h3>Model: <?php echo $model_number; ?></h3>
            </div>

        </section>
        <div class="clear"></div>

        <div>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Details</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">References</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="home"><?php echo $details; ?></div>
                <div role="tabpanel" class="tab-pane fade" id="profile"><?php echo $references; ?></div>
            </div>
        </div>
        
    </article>

    <?php if( $related_products ): ?>

        <section class="related-products">
            <h3>Related Products</h3>
            <hr>

            <ul class="posts-grid row-fluid unstyled">
            <?php foreach( $related_products as $post): // variable must be called $post (IMPORTANT) ?>
                <?php 
                    setup_postdata($post); 
                    $photo = get_field('photo');
                ?>
                <li class="span2">
                    <a href="<?php the_permalink(); ?>">                
                        <figure class="featured-thumbnail thumbnail">
                            <img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>">
                        </figure>
                        <div class="clear"></div>
                        <h4><?php the_title(); ?></h4>
                    </a>
                </li>
            <?php endforeach; ?>
            </ul>
        </section>

        <?php 
            // Important: Reset the $post object so the rest of the page works correctly 
            wp_reset_postdata(); 
        ?>

    <?php endif; ?>
    
<?php endwhile; endif; ?>