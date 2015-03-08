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

        $output = ob_get_clean();

        if (function_exists('is_feed') && is_feed()) {
            $response = new Response($output);
        } else {
            preg_match(sprintf('|%s|msU', preg_replace('|\s+|', '', implode('\s*', explode(PHP_EOL, trim('
                    <html[^>]*>
                        <head>(.*)</head>
                        <body[^>]*>
                            (.*)
                            <foot>(.*)</foot>
                        </body>
                    </html>
                '))))),
                $output,
                $matches
            );

            list($document, $head, $content, $foot) = $matches;

            $response = array(
                'head' => $head,
                'content' => $content,
                'foot' => $foot
            );
        }

        return $response;
    }
}
