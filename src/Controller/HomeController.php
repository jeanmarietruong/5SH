<?php

namespace App\Controller;

use App\Entity\Quizz;
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
        $id = rand(1, 732);
        return $this->render('home/index.html.twig',
            [
                'id' => $id
            ]);
    }

    /**
     * @Route("/profil", name="profil")
     */
    public function profilAccess()
    {

        return $this->render('home/profil.html.twig');
    }

    /**
     * @Route("/Quizzs/{id}", name="show_quizz")
     */
    public function showQuizz(int $id)
    {
        $api = new Api();
        $content = $api->quizz($id);
        return $this->render('quiz/quiz.html.twig',
            [
                'content' => $content
            ]);

    }
}
