<?php

namespace App\Controller;

use Symfony\Bridge\Twig\Validator\Constraints\Twig;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class HomeController extends AbstractController
{
    #[Route("/", name:"index")]
    public function index(): Response 
    {
        return new Response("<html><h1>bonjour</h1></html>");
    }
    
    #[Route("/about", name:"about")]
    public function about(): Response
    {
        return $this->render("about.html.twig");
    }

    #[Route("/hello/{name}", name:"hello")]
    public function hello($name): Response
    {
        return $this->render("hello.html.twig", ["name"=>ucfirst($name)]);
    }


    #[Route("/random", name:"random")]
    public function random(): Response
    {
        $quotes = [
            "follow the white rabbit",
            "may the force be with you",
            "I'll be back",
            "you shall not pass"
        ];
        $randomQuote = $quotes[random_int(0,sizeof($quotes)-1)];
        return $this->render("random.html.twig", ["quote"=>$randomQuote]);
    }
}
?>