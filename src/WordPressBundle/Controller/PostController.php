<?php

namespace WordPressBundle\Controller;

use JMS\DiExtraBundle\Annotation\Inject;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/wp")
 */
class PostController extends Controller
{
    /**
     * @Route("/recent", name="blog_recent_posts")
     * @Template
     */
    public function recentAction($options = array())
    {
        wp();

        $query = new \WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 2,
        ));

        $posts = array();

        while ($query->have_posts()) {
            $query->the_post();

            $posts[] = array(
                'title' => html_entity_decode(get_the_title()),
                'date' => new \DateTime(get_the_date(DATE_W3C)),
                'permalink' => get_permalink(),
                'content' => get_the_content(),
                'excerpt' => get_the_excerpt(),
            );
        }

        return array('posts' => $posts);
    }

    /**
     * @Route("/authors", name="blog_authors")
     */
    public function sidebarAction()
    {
        ob_start();

        wp_list_authors();

        return new Response(ob_get_clean());
    }

    /**
     * @Route("/pages", name="blog_pages")
     */
    public function menuAction()
    {
        ob_start();

        wp_list_pages();

        return new Response(ob_get_clean());
    }
}
