<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\Comment;
use AppBundle\Form\CategoryType;
use JMS\Serializer\SerializationContext;


class ObservationController extends Controller
{
    /**
     * @Route("/vote", name="vote", options = {"expose"=true})
     * @Method({"GET"})
     */
    public function voteAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $userId = $request->query->get('userId');
            $observationId = $request->query->get('observationId');
            $em = $this->getDoctrine()->getManager();
            $observation = $em->getRepository('AppBundle:Observation')->find($observationId);
            $userVoted = $em->getRepository('AppBundle:User')->find($userId);
            if ($observation == null) {
                return new Response("Pas d'observation avec cet id", 404);
            } elseif ($observation->getUsersVoted()->contains($userVoted)) {
                $observation->removeUsersVoted($userVoted);
                $em->flush();
                $nbVotes = count($observation->getUsersVoted());
                return new Response($nbVotes, 200);
            } else {
                $observation->addUsersVoted($userVoted);
                $em->persist($observation);
                $em->flush();
                $nbVotes = count($observation->getUsersVoted());
                return new Response($nbVotes, 200);
            }
        } else {
            return $this->redirect($this->generateUrl('homepage'));
        }


    }

    /**
     * @Route("/commentObservation", name="comment_observation", options = {"expose"=true})
     * @Method({"GET"})
     */
    public function commentObservationAction(Request $request)
    {
        {
            if ($request->isXmlHttpRequest()) {
                $commentContent = $request->query->get('commentContent');
                $observationId = $request->query->get('observationId');
                $em = $this->getDoctrine()->getManager();
                $user = $this->getUser();
                $commentObservation = new Comment();
                $observation = $em->getRepository('AppBundle:Observation')->find($observationId);
                if ($observation == null || $user == null) {
                    return new Response("Pas d'observation avec cet id, ou l'utilisateur n'est pas connecté", 404);
                } else {
                    $commentObservation->setContent($commentContent);
                    $commentObservation->setUser($user);
                    $commentObservation->setObservation($observation);
                    $em->persist($commentObservation);
                    $em->flush();
                    $comments = $observation->getComments();
                    $data = $this->get('jms_serializer')->serialize($comments, 'json', SerializationContext::create()->setGroups(array('comment_observation')));
                    return new JsonResponse($data, 200);
                }
            } else {
                return $this->redirect($this->generateUrl('homepage'));
            }
        }

    }

    /**
     * @Route("/coordinates_waiting_observations", name="coordinates_show_waiting_observations", options = {"expose"=true})
     * @Method({"GET"})
     */
    public function coordinatesShowAction(Request $request)
    {

        if ($request->isXmlHttpRequest()) {
            $coordinates = $this->getDoctrine()->getRepository('AppBundle:Observation')->findAllNoValidated();
            $data = $this->get('jms_serializer')->serialize($coordinates, 'json', SerializationContext::create()->setGroups(array('show_coordinates_no_validates')));
            $response = new JsonResponse($data);
            $response->headers->set('Content-Type', 'json');
            return $response;
        } else {
            return $this->redirect($this->generateUrl('homepage'));
        }

    }

    /**
     * @Route("/coordinates_id_observation", name="validated_observations_coordinates_show_id", options = {"expose"=true})
     * @Method({"GET"})
     */
    public function coordinatesObservationIdAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $birdsId = $request->query->get('birdsId');
            $observations = $this->getDoctrine()->getRepository('AppBundle:Observation')->findValidatedByBirdsId($birdsId);
            $observations = $this->get('jms_serializer')->serialize($observations, 'json', SerializationContext::create()->setGroups(array('show_coordinates')));
            if ($observations) {
                $response = new JsonResponse($observations);
                $response->headers->set('Content-Type', 'json');
                return $response;
            } else {
                return new Response('Aucune observation avec cet ID', 404);
            }
        } else {
            return $this->redirect($this->generateUrl('homepage'));
        }
    }

    /**
     * @Route("/delete_observation", name="delete_observation", options = {"expose"=true})
     * @Method({"GET"})
     */
    public function deleteObservationAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $observationId = $request->query->get('observationId');
            $observation = $em->getRepository('AppBundle:Observation')->find($observationId);
            $em->remove($observation);
            $em->flush();
            return new Response('Observation supprimée avec succès', 200);
        } else {
            return $this->redirect($this->generateUrl('homepage'));
        }
    }

    /**
 * @Route("/validate_observation", name="validate_observation", options = {"expose"=true})
 * @Method({"GET"})
 */
    public function validateObservationAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $observationId = $request->query->get('observationId');
            $taxrefId = $request->query->get('observationId');
            $observation = $em->getRepository('AppBundle:Observation')->find($observationId);
            $taxref = $em->getRepository('AppBundle:Taxref')->find($taxrefId);
            $observation->setIsValidated(true);
            $observation->setTaxref($taxref);
            $em->persist($observation);
            $em->flush();
            return new Response('Observation valider avec succès', 200);
        } else {
            return $this->redirect($this->generateUrl('homepage'));
        }
    }


}
