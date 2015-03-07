<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/products", name="products")
     */
    public function productsAction()
    {
        return $this->render('products.html.twig');
    }

    /**
     * @Route("/categories", name="categories")
     */
    public function categoriesAction()
    {
        return $this->render('categories.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction()
    {
        return $this->render('contact.html.twig');
    }

}
