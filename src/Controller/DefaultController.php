<?php

namespace App\Controller;


use App\Entity\Traobject;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @package App\Controller
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage()
    {
        $traobjects = $this->getDoctrine()->getRepository(Traobject::class)->findAll();

        return $this->render('default/homepage.html.twig', [
            "traobjects" => $traobjects,
        ]);
    }

}