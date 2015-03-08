<?php

namespace WordPressBundle\Controller;

use JMS\DiExtraBundle\Annotation\Inject;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/blog")
 */
class BlogController extends Controller
{
    /**
     * @Route("/", name="blog")
     * @Route("/{x}", requirements={"x": ".+"}, name="blog_page")
     * @Template
     */
    public function indexAction()
    {
        wp();

        ob_start();

        defined('WP_USE_THEMES') or define('WP_USE_THEMES', true);

        require_once(ABSPATH . WPINC . '/template-loader.php');

        return new Response(ob_get_clean());
    }
}
