<?php

namespace App\Controller;

use App\Entity\State;
use App\Form\StateType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/state")
 */
class StateController extends AbstractController
{
    /**
     * @Route("/", name="state_index", methods="GET")
     */
    public function index(): Response
    {
        $states = $this->getDoctrine()
            ->getRepository(State::class)
            ->findAll();

        return $this->render('state/index.html.twig', ['states' => $states]);
    }

    /**
     * @Route("/new", name="state_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $state = new State();
        $form = $this->createForm(StateType::class, $state);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($state);
            $em->flush();

            return $this->redirectToRoute('state_index');
        }

        return $this->render('state/new.html.twig', [
            'state' => $state,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="state_show", methods="GET")
     */
    public function show(State $state): Response
    {
        return $this->render('state/show.html.twig', ['state' => $state]);
    }

    /**
     * @Route("/{id}/edit", name="state_edit", methods="GET|POST")
     */
    public function edit(Request $request, State $state): Response
    {
        $form = $this->createForm(StateType::class, $state);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('state_index', ['id' => $state->getId()]);
        }

        return $this->render('state/edit.html.twig', [
            'state' => $state,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="state_delete", methods="DELETE")
     */
    public function delete(Request $request, State $state): Response
    {
        if ($this->isCsrfTokenValid('delete'.$state->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($state);
            $em->flush();
        }

        return $this->redirectToRoute('state_index');
    }


}
