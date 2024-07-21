<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController
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

    #[Route('/messages/{id}', name: 'show_index')]
    public function showOne($id): Response
    {
        return new Response($this->messages[$id]);
    }
}
