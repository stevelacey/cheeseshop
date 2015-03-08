<?php get_header() ?>

    <?php if (have_posts()) : while (have_posts()) : the_post() ?>
        <article class="blog-article">
            <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
            <time><?php the_time('d F Y') ?></time>
            <?php the_excerpt('...') ?>

            <?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')) ?>

            <?php include (TEMPLATEPATH . '/lib/partials/meta.php') ?>
        </article>
    <?php endwhile; endif ?>

    <?php include (TEMPLATEPATH . '/lib/partials/archive-nav.php') ?>

<?php get_footer() ?>