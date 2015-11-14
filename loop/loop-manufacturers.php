<?php /* Loop Name: Manufacturers */ ?>

<?php
    $args = array(
        'orderby'    => 'name', 
        'order'      => 'ASC',
        'hide_empty' => false
    );
    $terms = get_terms( 'manufacturer', $args );
?>

<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ): ?>

    <!-- display featured logos -->
    <h3>Featured Suppliers</h3>
    
    <?php $n = 0; ?>
    <?php foreach ( $terms as $term ): ?>

        <?php 
            // Only display featured logos
            $featured = get_field('featured', $term);
            if ( ! $featured) {
                continue;
            }
        ?>

        <?php if ($n % 4 == 0): ?>
        <ul class="posts-grid row-fluid unstyled featured-logos">
        <?php endif; ?>

            <?php $image = get_field('logo', $term); ?>
            <li class="span3">
                <span></span>
                <a href="/manufacturer/<?php echo $term->slug; ?>" title="<?php echo $image['alt']; ?>">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                </a>
            </li>

        <?php if ($n % 4 == 3): ?>
        </ul>
        <?php endif; ?>

        <?php $n++; ?>
    <?php endforeach; ?>

    <!-- Catch any unclosed lists -->
    <?php $n--; ?>
    <?php if ($n % 4 != 3): ?></ul><?php endif; ?>
    <div class="clear"></div>
     
    <hr>

    <!-- display links to all manufactures -->
    <h3>Our Suppliers</h3>

    <div class="list styled">
        <?php foreach ( $terms as $n => $term ): ?>

        <?php if ($n % 4 == 0): ?>
        <ul class="posts-grid row-fluid unstyled manufactures-list">
        <?php endif; ?>

            <li class="span3">
                <a href="/manufacturer/<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
            </li>

        <?php if ($n % 4 == 3): ?>
        </ul>
        <?php endif; ?>

        <?php endforeach; ?>

        <!-- Catch any unclosed lists -->
        <?php if ($n % 4 != 3): ?></ul><?php endif; ?>
        <div class="clear"></div>        
    </div>

<?php endif; ?>