<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class StateController extends AbstractController
{
    /**
     * @Route("/state", name="state")
     */
    public function index()
    {
        return $this->render('state/index.html.twig', [
            'controller_name' => 'StateController',
        ]);
    }
}
