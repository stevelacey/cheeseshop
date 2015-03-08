<?php if (get_previous_posts_link() || get_next_posts_link()) : ?>

    <div class="archive-blog-pagination group">
        <?php if ($next = get_next_posts_link('Older posts')) : ?>
            <div class="previous"><?php echo $next; ?></div>
        <?php endif ?>

        <?php if ($previous = get_previous_posts_link('Newer posts')) : ?>
            <div class="next"><?php echo $previous; ?></div>
        <?php endif ?>
    </div>

<?php endif ?>