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
use JMS\Serializer\SerializationContext;


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

    /**
     * @Route("observation/filter",
     *      name = "filter_bird",
     *      options = {"expose"=true})
     * @Method("GET")
     */
    public function filterBirdAction(Request $request) {

            $plumage = $request->query->get('plumage');
            $couleur_bec = $request->query->get('couleur_bec');
            $pattes = $request->query->get('pattes');
            $forme_bec = $request->query->get('forme_bec');
            $em = $this->getDoctrine()->getManager();
            $birds = $em->getRepository('AppBundle:Bird')->searchBirds($plumage, $couleur_bec, $pattes, $forme_bec);
            dump($birds);

            $serializer = $this->get('jms_serializer');
            $jsonContent = $serializer->serialize($birds, 'json');
            $response = new Response($jsonContent);
            dump($jsonContent);

            $response->headers->set('Content-Type', 'application/json');
            return $response;
    }
    /**
     * @Route("/birds", name="bird_create")
     * @Method({"POST"})
     */
    public function createBirdAction(Request $request) {
        $data = $request->getContent();
        $bird = $this->get('jms_serializer')->deserialize($data, 'AppBundle\Entity\Bird', 'json');
        $em = $this->getDoctrine()->getManager();
        $em->persist($bird);
        $em->flush();

        return new Response('', Response::HTTP_CREATED);

    }

    /**
     * @Route("/birds/{id}", name="bird_show")
     * @Method({"GET"})
     */
    public function showBirdAction(Bird $bird) {
        $data = $this->get('jms_serializer')->serialize($bird, 'json', SerializationContext::create()->setGroups(array('help_user')));
        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/birds", name="birds_show")
     * @Method({"GET"})
     */
    public function showBirdsAction() {
        $birds = $this->getDoctrine()->getRepository('AppBundle:Bird')->findAll();
        $data = $this->get('jms_serializer')->serialize($birds, 'json', SerializationContext::create()->setGroups(array('help_user')));
        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

}
