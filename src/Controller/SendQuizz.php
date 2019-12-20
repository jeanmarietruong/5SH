<?php


namespace App\Controller;



use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Quizz;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class SendQuizz
 * @package App\Controller
 */
class SendQuizz extends  AbstractController
{
    /**
     * @Route("/sendquizz", name="send")
     */
    public function send(Request $request, User $user)
    {

        $id = $user->getId();
        $content = $request->getContent();

        return new JsonResponse('ok');

   }
}