<?php get_header() ?>

    <?php if (have_posts()) : while (have_posts()) : the_post() ?>

        <article role="main" class="blog-article">

            <?php if (has_post_thumbnail() ): ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="feature-img"><?php echo get_the_post_thumbnail(get_the_id(), 'full'); ?></a>
            <?php endif; ?>

            <time><?php the_time('d F Y') ?></time>
            <h1><?php the_title() ?></h1>

            <?php the_content() ?>

            <?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')) ?>

            <?php include (TEMPLATEPATH . '/lib/partials/meta.php') ?>

            <?php if (has_tag('recipe')): ?>
                <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
            <?php endif; ?>

            <?php include (TEMPLATEPATH . '/lib/partials/nav.php') ?>

        </article>

    <?php endwhile; endif ?>

<?php get_footer() ?>
