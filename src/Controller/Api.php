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
//        var_dump($reponserandom);
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

        $result = [
            array_intersect_assoc($reponse[0], $question[0]),
            array_intersect_assoc($reponse[0], $reponse[1]),

            array_intersect_assoc($reponse[1], $question[0]),
            array_intersect_assoc($reponse[1], $reponse[2]),

            array_intersect_assoc($reponse[2], $question[0]),
            array_intersect_assoc($reponse[2], $reponse[0])
        ];
        $alert = 'false';

        while ($alert === 'false') {
            foreach ($result as $key => $value) {
                if (!empty($result[$key])) {
                    foreach ($value as $k => $v) {
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
                            if ($key == 0 or $key == 1) {
                                $reponse[0][$k] = $recherche[$k];
                            }
                            if ($key == 2 or $key == 3) {
                                $reponse[1][$k] = $recherche[$k];
                            }
                            if ($key == 4 or $key == 5) {
                                $reponse[2][$k] = $recherche[$k];
                            }
                        }
                    }
                }
            }
            $result = [
                array_intersect_assoc($reponse[0], $question[0]),
                array_intersect_assoc($reponse[0], $reponse[1]),

                array_intersect_assoc($reponse[1], $question[0]),
                array_intersect_assoc($reponse[1], $reponse[2]),

                array_intersect_assoc($reponse[2], $question[0]),
                array_intersect_assoc($reponse[2], $reponse[0])
            ];

            if (empty($result[0]) and empty($result[1]) and empty($result[2]) and empty($result[3]) and empty($result[4]) and empty($result[5])){
                $alert = 'true';
            } else {
                $alert = 'false';
            }
            var_dump($result);
        }

//        var_dump($result);


        return $reponse;
    }
}