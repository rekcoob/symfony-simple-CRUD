<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PostController extends AbstractController
{
     /**
      * @Route("/")
      * @Method("GET")
      */
    public function index()
    {       
        return $this->render(
            'posts/index.html.twig'
        );
    }
}
