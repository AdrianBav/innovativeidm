<?php /* Loop Name: Technologies */ ?>

<?php
    $args = array(
        'orderby'           => 'name', 
        'order'             => 'ASC',
        'hide_empty'        => false
    );
    $terms = get_terms( 'technology', $args );
?>

<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ): ?>
    
    <?php foreach ( $terms as $n => $term ): ?>
        
        <?php if ($n % 3 == 0): ?>
        <ul class="posts-grid row-fluid unstyled">
        <?php endif; ?>

            <?php
                $full_description = get_field('full_description', $term);
                $image = get_field('image', $term);

                $short_description = wp_trim_words($full_description, 40);
            ?>
            
            <li class="span4 list-item-1">
                <figure class="featured-thumbnail thumbnail">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                </figure>
                <div class="clear"></div>
                <h5><a href="/technology/<?php echo $term->slug; ?>" title="<?php echo $term->name; ?>"><?php echo $term->name; ?></a></h5>
                <p class="excerpt"><?php echo $short_description; ?></p>
            </li>

        <?php if ($n % 3 == 2): ?>
        </ul>
        <?php endif; ?>

    <?php endforeach; ?>

    <!-- Catch any unclosed lists -->
    <?php if ($n % 3 != 2): ?></ul><?php endif; ?>

<?php endif; ?>