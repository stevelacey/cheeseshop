<footer class="meta">
    Categories: <?php $cats = wp_get_post_categories(get_the_ID()); ?>

    <?php $categories = array(); ?>

    <?php foreach($cats as $cat): ?>
        <?php $cat = get_category( $cat ) ?>
        <?php $cat_link = get_category_link($cat->cat_ID) ?>
        <?php $categories[] = sprintf('<a href="%2$s" title="%1$s">%1$s</a>', $cat->name, $cat_link) ?>
    <?php endforeach ?>

    <?php echo $categories ? implode(", ", $categories) : "None"; ?>

    <br>

    <?php the_tags('Tags: ', ', ', '') ?>

    <?php edit_post_link(sprintf('Edit this %s', get_post_type(get_the_ID())), '<p>', '.</p>') ?>
</footer>
