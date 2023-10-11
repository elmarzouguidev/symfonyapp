<?php

namespace App\Controller;

use App\Entity\Blog;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{

    #[Route('/blog/{slug}', name: 'blog_show')]
    public function show(string $slug): Response
    {
        return $this->render('blog/single.html.twig', [
            'title' => $slug,
        ]);
    }


    #[Route('/blog', name: 'blog_list', priority: 2)]
    public function list(): Response
    {
        return $this->render('blog/index.html.twig', [
            'title' => 'Elmarzougui Blog',
        ]);
    }

    #[Route('/blog/create', name: 'create_blog', priority: 1)]
    public function createProduct(EntityManagerInterface $entityManager): Response
    {
        $blog = new Blog();
        $blog->setTitle('Keyboard');
        $blog->setContent('Ergonomic and stylish !');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($blog);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new BLOG with id '.$blog->getId());
    }
}
