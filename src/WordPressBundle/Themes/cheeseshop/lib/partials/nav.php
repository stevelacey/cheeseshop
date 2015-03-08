<?php if (get_previous_post() || get_next_post()) : ?>

    <div class="blog-pagination">

    <?php if ($previous = get_previous_post()) : ?>
        <a href="<?php echo get_permalink($previous) ?>" class="flL">
            <span class="prev"><</span>
            <?php echo $previous->post_title ?>
        </a>
    <?php endif ?>

    <?php if ($next = get_next_post()) : ?>
        <a href="<?php echo get_permalink($next) ?>" class="flR">
            <?php echo $next->post_title ?>
            <span class="next">></span>
        </a>
    <?php endif ?>

    <div>

<?php endif ?>