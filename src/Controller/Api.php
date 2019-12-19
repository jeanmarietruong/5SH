<?php


namespace App\Controller;

use http\Client\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Routing\Annotation\Route;


class Api extends AbstractController
{
    const LINK = 'https://www.superheroapi.com/api/907407582990145/';

    /**
     * @Route({
     *     "fr": "/Hero/{id}",
     * }, name="Show_Hero")
     */

    public function index(int $id) {
        $client = HttpClient::create();
        $response = $client->request('GET', self::LINK.$id);
        $statusCode = $response->getStatusCode();

        if ($statusCode === 200) {
            $content = $response->getContent();
            $content = $response->toArray();
        }

        return $this->render('hero/show.html.twig',
            [
                'content' => $content,
        ]);
    }

    /**
     * @Route({
     *     "fr": "/Quizz/{idHero}",
     * }, name="Quizz_Hero")
     */

    public function quizz(int $idHero) {
        $client = HttpClient::create();
        $response = $client->request('GET', self::LINK.$idHero);
        $statusCode = $response->getStatusCode();

        if ($statusCode === 200) {
            $content = $response->getContent();

            $hero = $response->toArray();

            $question[] = [
                0 => $hero['biography']['full-name'],
                1 => $hero['biography']['place-of-birth'],
                2 => $hero['appearance']['race'],
                3 => $hero['biography']['aliases'][0],
                4 => $hero['biography']['publisher'],
                5 => $hero['work']['occupation'],
                6 => $hero['connections']['group-affiliation'],
                7 => $hero['connections']['relatives'],
                8 => $hero['work']['base'],
                9 => $hero['biography']['first-appearance']
            ];
        }
        $reponserandom = $this->random(2, $question);
        var_dump($reponserandom);
        return $this->render('quizz/quizz.html.twig',
            [
                'hero' => $hero, 'reponse' => $question, 'faux' => $reponserandom
            ]);
    }

    public function random(int $quantiter, array $question) {
        $reponse = [0, 1, 2];
        $faux = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        for ($i = 0; $i <= $quantiter; $i++) {

            for ($u = 0; $u <= 9; $u++) {
                $client = HttpClient::create();
                $randomid = rand(1, 732);
                $response = $client->request('GET', self::LINK.$randomid);
                $statusCode = $response->getStatusCode();

                if ($statusCode === 200) {
                    $content = $response->getContent();
                    $hero = $response->toArray();
                    $recherche = [
                        0 => $hero['biography']['full-name'],
                        1 => $hero['biography']['place-of-birth'],
                        2 => $hero['appearance']['race'],
                        3 => $hero['biography']['aliases'][0],
                        4 => $hero['biography']['publisher'],
                        5 => $hero['work']['occupation'],
                        6 => $hero['connections']['group-affiliation'],
                        7 => $hero['connections']['relatives'],
                        8 => $hero['work']['base'],
                        9 => $hero['biography']['first-appearance']
                    ];
                    $faux[$u] = $recherche[$u];

                }
            }
            $reponse[$i] = $faux;
        }

        return $reponse;
    }
}