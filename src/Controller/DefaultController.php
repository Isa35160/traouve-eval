<?php

namespace App\Controller;

use App\Entity\Traobject;
use App\Entity\State;
use App\Entity\Category;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @package App\Controller
 */
class DefaultController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage()
    {
        $traobjects = $this->getDoctrine()->getRepository(Traobject::class)->findLast(6);
        $categories = $this->getDoctrine()->getRepository(Category::class)->findBy([], ['name' => 'ASC']);
        return $this->render('default/homepage.html.twig', [
            "traobjects" => $traobjects,
            "categories" => $categories,
        ]);
    }

}