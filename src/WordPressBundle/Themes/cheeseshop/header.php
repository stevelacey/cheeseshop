<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta charset="<?php bloginfo('charset') ?>" />

        <title><?php wp_title(null, true, 'right') ?></title>

        <meta name="title" content="<?php wp_title(null, true, 'right') ?>" />

        <?php if (is_search()) : ?>
            <meta name="robots" content="noindex, nofollow" />
        <?php endif ?>

        <link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />

        <?php if (is_singular()) wp_enqueue_script('comment-reply') ?>

        <?php wp_head() ?>
    </head>

    <body>

        <div class="secondary-primary">

            <div class="primary">