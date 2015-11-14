<?php /* Loop Name: Manufacturer */ ?>

<?php
	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

    //$image = get_field('logo', $term);
    $about = get_field('about', $term);
    $news = get_field('news', $term);
    $events = get_field('events', $term);
    $featured_products = get_field('featured_products', $term);
?>

<div>
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">About</a></li>
        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">News</a></li>
        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Events</a></li>
    </ul>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="home"><?php echo $about; ?></div>
        <div role="tabpanel" class="tab-pane fade" id="profile"><?php echo $news; ?></div>
        <div role="tabpanel" class="tab-pane fade" id="messages"><?php echo $events; ?></div>
    </div>
</div>

<?php if ( $featured_products ): ?>
    
    <section class="featured-products">    
        <h3><?php echo "Featured {$term->name} Products"; ?></h3>
        <hr>

        <ul class="posts-grid row-fluid unstyled">
        <?php foreach( $featured_products as $post): // variable must be called $post (IMPORTANT) ?>
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