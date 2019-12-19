<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    const LINK = 'https://www.superheroapi.com/api/907407582990145/';
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig');
    }

    /**
     * @Route("/profil", name="profil")
     */
    public function profilAccess()
    {
        return $this->render('home/profil.html.twig');
    }

    /**
     * @Route("/Quizzs", name="show_quizz")
     */
    public function showQuizz()
    {
        /*$names = [];
        $client = HttpClient::create();
        for($i=1;$i<=50;$i++) {
            $response = $client->request('GET', self::LINK.$i.'/image');
            $statusCode = $response->getStatusCode();

            if ($statusCode === 200) {
//                $content = $response->getContent();
                $names[] = $response->toArray();

//                $content = $response->toArray();
            }
        }

        var_dump($names);
        exit();*/


        return $this->render('home/showQuizz.html.twig');
    }
}
