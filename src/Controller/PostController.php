<?php

namespace App\Controller;

use App\Entity\Post;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PostController extends AbstractController
{
     /**
      * @Route("/", name="post_list")
      * @Method("GET")
      */
    public function index()
    {       
        $posts = $this->getDoctrine()
        ->getRepository(Post::class)->findAll();

        return $this->render(
            'posts/index.html.twig', array('posts' => $posts)
        );
    }

     /**
      * @Route("/post/{id}", name="post_show")      
      */
    public function show($id)
    {       
        $post = $this->getDoctrine()
        ->getRepository(Post::class)->find($id);

        return $this->render(
            'posts/show.html.twig', array('post' => $post)
        );
    }
}
