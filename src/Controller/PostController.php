<?php

namespace App\Controller;

use App\Entity\Post;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Form\Extension\Core\Type\{TextType, TextareaType, SubmitType};  

class PostController extends AbstractController
{
     /**
      * @Route("/", name="post_list")
      * @Method({"GET"})
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
      * @Route("/post/new", name="new_post")
      * Method({"GET", "POST"})
      */
    public function newPost(Request $request)
    {      
        // CREATE FORM
        $post = new Post();
        // $article = $this->getDoctrine()->getRepository(Article::class)->find($id);
  
        $form = $this->createFormBuilder($post)
          ->add('title', TextType::class, array('attr' => array('class' => 'form-control')))
          ->add('body', TextareaType::class, array(
            'required' => false,
            'attr' => array('class' => 'form-control')
          ))
          ->add('save', SubmitType::class, array(
            'label' => 'Create',
            'attr' => array('class' => 'btn btn-primary mt-3')
          ))
          ->getForm();

        // SEND REQUEST TO DB
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
          $post = $form->getData();

          $entityManager = $this->getDoctrine()->getManager();
          $entityManager->persist($post);
          $entityManager->flush();

          return $this->redirectToRoute('post_list');
        }

        return $this->render(
            'posts/new.html.twig', array('form' => $form->createView())
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
