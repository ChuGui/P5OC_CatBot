<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\Bird;
use AppBundle\Form\CategoryType;


class BirdController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     * @Route("observation/add", name="bird_add")
     */
    public function addAction(Request $request)
    {
        $bird = new Bird();
        $formBird = $this->createForm(BirdType::class, $bird);
        $formBird->handleRequest($request);

        if($formBird->isSubmitted() && $formBird->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bird);
            $em->flush();

            return new Response('Espèce ajoutée');
        }

        return $this->render('birdAdd.html.twig', array(
            'formBird' => $formBird->createView()
        ));

    }







}
