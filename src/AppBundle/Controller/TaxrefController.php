<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\Taxref;
use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpKernel\Exception\HttpException;


class TaxrefController extends Controller
{
    /**
     * @Route("/showScientificNames", name="showScientificNames", options = {"expose"=true})
     * @Method({"GET"})
     */
    public function ShowScientifiqueNamesAction(Request $request)
    {

            $em = $this->getDoctrine()->getManager();
            $scientificNames = $em->getRepository('AppBundle:Taxref')->findAllByNameAsc();


            $data = $this->get('jms_serializer')->serialize($scientificNames, 'json', SerializationContext::create()->setGroups(array('scientificNames')));
            if ($data) {
                $response = new JsonResponse($data);
                $response->headers->set('Content-Type', 'json');
                return $response;
            } else {
                return new Response("une erreur s'est produite côté serveur", 404);
            }

    }
}
