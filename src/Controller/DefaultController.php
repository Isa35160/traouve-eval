<?php

namespace App\Controller;


use App\Entity\Category;
use App\Entity\State;
use App\Entity\Traobject;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @package App\Controller
 */
class DefaultController extends BaseController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage()
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
        $state_lost = $this->getDoctrine()->getRepository(State::class)->findOneBy(["label" => State::LOST]);
        $state_found = $this->getDoctrine()->getRepository(State::class)->findOneBy(["label" => State::FOUND]);
        $traobjectslosts = $this->getDoctrine()->getRepository(Traobject::class)->findLastTraobjectByState($state_lost, 4);
        $traobjectsfounds = $this->getDoctrine()->getRepository(Traobject::class)->findLastTraobjectByState($state_found, 4);

        return $this->render('default/homepage.html.twig', [
            "categories" => $categories,
            "traobjectslosts" => $traobjectslosts,
            "traobjectsfounds" => $traobjectsfounds
        ]);
    }

}