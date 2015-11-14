# Innovative IDM

An industrial automaton, controls and repairs company website developed in WordPress.

## Project

The client required a product catalog to simply display abailable products without any e-commerce functionality.
I created a custom post type for products and created two taxonomies for manufacturers and technologies.

## Structure

The page templates allow for some minor customizations but the real logic is the the /loop folder.
The page loops extracts custom fields from the post type and taxonomies.

```
innovativeidm/
+-- loop/
¦	+-- loop-manufacturer.php
¦	+-- loop-manufacturers.php
¦	+-- loop-product.php
¦	+-- loop-technologies.php
¦	+-- loop-technology.php
+-- page-manufacturers.php
+-- page-technologies.php
+-- single-product.php
+-- style.css
+-- taxonomy-manufacturer.php
+-- taxonomy-technology.php
```

## Live Examples

Manufacturers Page:
http://beta.innovativeidm.com/manufacturers/

Technologies Page:
http://beta.innovativeidm.com/technologies/
