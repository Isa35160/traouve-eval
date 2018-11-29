<?php

namespace App\Controller;

use App\Entity\County;
use App\Entity\Traobject;
use App\Form\CountyType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/county")
 */
class CountyController extends BaseController
{
    /**
     * @Route("/", name="county_index", methods="GET")
     */
    public function index(): Response
    {
        $counties = $this->getDoctrine()
            ->getRepository(County::class)
            ->findAll();

        return $this->render('county/index.html.twig', ['counties' => $counties]);
    }

    /**
     * @Route("/new", name="county_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $county = new County();
        $form = $this->createForm(CountyType::class, $county);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($county);
            $em->flush();

            return $this->redirectToRoute('county_index');
        }

        return $this->render('county/new.html.twig', [
            'county' => $county,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/show/{id}", name="county_show", methods="GET")
     */
    public function show(County $county): Response
    {
        $traobjects = $this->getDoctrine()->getRepository(Traobject::class)->findBy(["county" => $county]);
        return $this->render('county/show.html.twig', ['county' => $county, "traobjects" => $traobjects]);
    }

    /**
     * @Route("/{id}/edit", name="county_edit", methods="GET|POST")
     */
    public function edit(Request $request, County $county): Response
    {
        $form = $this->createForm(CountyType::class, $county);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('county_index', ['id' => $county->getId()]);
        }

        return $this->render('county/edit.html.twig', [
            'county' => $county,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="county_delete", methods="DELETE")
     */
    public function delete(Request $request, County $county): Response
    {
        if ($this->isCsrfTokenValid('delete'.$county->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($county);
            $em->flush();
        }

        return $this->redirectToRoute('county_index');
    }

    public function countyfooterlist()
    {
        $categories = $this->getDoctrine()->getRepository(County::class)->findAll();
        return $this->render(
            'default/countyfooterlist.html.twig',
            ['categories' => $categories]
        );
    }
}
