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
      * @Route("/")
      * @Method("GET")
      */
    public function index()
    {       
        $posts = [ 'Post One', 'Post Two', 'Post Three'];

        return $this->render(
            'posts/index.html.twig', array('posts' => $posts)
        );
    }

     /**
      * @Route("/post/save")      
      */
    public function save()
    {       
        $entityManager = $this->getDoctrine()->getManager();
  
        $post = new Post();
        $post->setTitle('Post Tw0');
        $post->setBody('Sit amet, consectetur adipiscing elit.');

        $entityManager->persist($post);

        $entityManager->flush();

        return new Response('Saves post with the id of ' . $post->getId());
    }
}
