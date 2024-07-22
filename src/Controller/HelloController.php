<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    private array $messages = [
        "zoo", "foo", "xoo"
    ];

    #[Route('/zob', name: 'zob_index')]
    public function zob()
    {
        return new Response("zob");
    }

    #[Route('/zoo', name: 'zoo_index')]
    public function zoo()
    {
        return new Response(implode(',', $this->messages));
    }

    #[Route('/woo/{limit<\d+>?3}', name: 'woo_index')]
    public function woo(int $limit)
    {
        // return new Response(implode(',', array_slice($this->messages, 0, $limit)));
        return $this->render(
            'hello/index.html.twig',
            [
                'message' => implode(',', array_slice($this->messages, 0, $limit))
            ]
            );
    }

    #[Route('/messages/{id<\d+>}', name: 'show_index')]
    public function showOne(int $id): Response
    {
        return $this->render(
            'hello/show_one.html.twig',
            [
                'message' => $this->messages[$id]
            ]
        );
        // return new Response($this->messages[$id]);
    }
}
