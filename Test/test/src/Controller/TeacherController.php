<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class TeacherController extends AbstractController
{
    /**
     * @Route("/teacher", name="teacher")
     */
    public function index()
    {
        return $this->render('teacher/index.html.twig', [
            'controller_name' => 'TeacherController',
        ]);
    }

    /**
     * @return Response
     * @Route("/affiche", name="affiche")
     */
    public function Affiche()
    {
        return new Response("bonjour a tous");
    }
    /**
     * @param $nom
     * @Route("/afficheNom/{nom}", name="afficheNom")
     */
    public function AfficheNom($nom)
    {
        return $this->render('teacher/affiche.html.twig', ['n'=>$nom]);
    }


}
