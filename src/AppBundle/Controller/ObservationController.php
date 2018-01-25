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
    public function coordinatesShowAction()
    {

        $coordinates = $this->getDoctrine()->getRepository('AppBundle:Observation')->findAllNoValidated();
        $data = $this->get('jms_serializer')->serialize($coordinates, 'json', SerializationContext::create()->setGroups(array('show_coordinates_no_validates')));
        $response = new JsonResponse($data);
        $response->headers->set('Content-Type', 'json');
        return $response;
    }
}
