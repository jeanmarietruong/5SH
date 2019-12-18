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
}