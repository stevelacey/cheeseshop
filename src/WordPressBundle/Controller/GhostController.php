<?php

namespace WordPressBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/spooky")
 */
class GhostController extends Controller
{
    /**
     * @Route("/", name="ghost")
     * @Route("/{x}", requirements={"x": ".+"}, name="ghost_page")
     * @Template
     */
    public function indexAction(Request $request)
    {
        return array(
            'uri' => 'http://127.0.0.1/' . str_replace('/spooky', '', $request->getRequestUri())
        );
    }
}
