<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TraObjectController extends AbstractController
{
    /**
     * @Route("/tra/object", name="tra_object")
     */
    public function index()
    {
        return $this->render('tra_object/index.html.twig', [
            'controller_name' => 'TraObjectController',
        ]);
    }
}
