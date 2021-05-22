<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RevClubController extends AbstractController
{
    /**
     * @Route("/rev/club", name="rev_club")
     */
    public function index()
    {
        return $this->render('rev_club/index.html.twig', [
            'controller_name' => 'RevClubController',
        ]);
    }


}
