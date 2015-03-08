<aside role="complementary" class="secondary" >

    <section class="categories">
        <h3>Latest posts</h3>
        <nav class="blog-nav">
            <ul class="latest">
                <?php
                $post_query = new WP_Query(array(
                    'post_type' => 'post',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'posts_per_page' => 7
                ));
                if(count($post_query->posts) > 0): ?>

                    <?php while ($post_query->have_posts()) : $post_query->the_post(); ?>

                        <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>

                    <?php endwhile; ?>

                <?php endif; ?>
            </ul>
        </nav>
    </section>

    <section class="archive">
        <h3>Archive</h3>
        <nav class="blog-nav">
            <ul>
                <?php wp_get_archives('type=monthly&show_post_count=0&limit=11'); ?>
            </ul>
        </nav>
    </section>

    <?php dynamic_sidebar('Blog Sidebar') ?>

</aside>
