<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'blog')]
    public function index(): Response
    {
        return $this->render('blog/index.html.twig');
    }

    #[Route('/blog/{article}', name: 'article')]
    public function display(Request $request)
    {

        $article = $request->attributes->get('article');
        $products = [
            [
                'name' => 'Tesla',
                'price' => 25000,
                'createdAt' => strtotime('yesterday')
            ],
            [
                'name' => 'Cybertruck',
                'price' => 50000,
                'createdAt' => strtotime('today')
            ],
            [
                'name' => 'Model 3',
                'price' => 35000,
                'createdAt' => strtotime('tomorrow')
            ]
        ];

        return $this->render('blog/article.html.twig', [
            'article' => $article,
            'products' => $products,
        ]);
    }

    #[Route('last-article', name: 'last_article')]
    public function lastBlogArticle(){

        $blog = [
            'title' => "toto"
        ];

        return $this->render('partials/_last_blog_article.html.twig', [
            'blog' => $blog
        ]);
    }

}
