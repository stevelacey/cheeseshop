<?php get_header() ?>

	<?php if (have_posts()) : ?>

		<?php /* If this is a category archive */ if (is_category()) { ?>
			<h1>Archive for the &#8216;<?php single_cat_title() ?>&#8217; Category</h1>

		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
			<h1>Posts Tagged &#8216;<?php single_tag_title() ?>&#8217;</h1>

		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			<h1>Archive for <?php the_time('F jS, Y') ?></h1>

		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<h1>Archive for <?php the_time('F, Y') ?></h1>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<h1>Archive for <?php the_time('Y') ?></h1>

		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
			<h1>Author Archive</h1>

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h1>Blog Archives</h1>
		<?php } ?>

		<?php while (have_posts()) : the_post() ?>

			<article class="blog-article">

				<?php if (has_post_thumbnail() ): ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="feature-img"><?php echo get_the_post_thumbnail(get_the_id(), 'full'); ?></a>
                <?php endif; ?>

				<time><?php the_time('d F Y') ?></time>
				<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
  	            <?php the_excerpt() ?>
			</article>

		<?php endwhile ?>

        <?php include (TEMPLATEPATH . '/lib/partials/pagination.php') ?>

	<?php else : ?>

		<h2>Nothing found</h2>

	<?php endif ?>

<?php get_footer() ?>
