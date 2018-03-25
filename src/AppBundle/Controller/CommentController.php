<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Actualite;
use AppBundle\Entity\Comment;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Form\CategoryType;
use JMS\Serializer\SerializationContext;

class CommentController extends Controller
{
    /**
     * @Route("add/comment}", name="add_comment_actualite", options = {"expose"=true})
     * @Method({"GET"})
     */
    public function addCommentActualiteAction(Request $request)
    {
        $user = $this->getUser();
        if ($request->isXmlHttpRequest()) {
            if ($user === null) {
                throw $this->createNotFoundException("Aucun utilisateur n'est connecté");
            } else {
                $actualiteId = $request->query->get('actualiteId');
                $commentContent = $request->query->get('commentContent');
                $em = $this->getDoctrine()->getManager();
                $actualite = $em->getRepository("AppBundle:Actualite")->find($actualiteId);
                $comment = new Comment();
                $comment->setActualite($actualite);
                $comment->setUser($user);
                $comment->setContent($commentContent);
                $em->persist($comment);
                $em->flush();
                $comments = $em->getRepository("AppBundle:Comment")->findByActualite($actualiteId);
                if($comments){
                    $commentsJson = $this->get('jms_serializer')->serialize($comments, 'json', SerializationContext::create()->setGroups(array('comment_actualite')));
                    $response = new JsonResponse($commentsJson);
                    $response->headers->set('Content-Type', 'json');
                    return $response;
                }else{
                    return new Response('Aucune actualite avec cet ID', 404);
                }
            }
        } else {
            return new Response("Erreur: Ce n'est pas une requête AJAX", 400);
        }
    }
}
