<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Actualite;
use AppBundle\Entity\User;
use AppBundle\Form\ActualiteType;
use AppBundle\Form\SearchUserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin", options={"expose"=true})
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function adminAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('AppBundle:User')->findAllByNameASCExceptAdmin();
        $actualites = $em->getRepository('AppBundle:Actualite')->findAll();
        $actualite = new Actualite();
        $formActualite = $this->createForm(ActualiteType::class, $actualite);
        $formActualite->handleRequest($request);
        if($formActualite->isValid() && $formActualite->isSubmitted()) {
            $em->persist($actualite);
            $em->flush();
            $this->addFlash('notice',"L'actualité à bien été rajoutée");
            return $this->redirectToRoute('admin');
        };

        $formSearchUser = $this->createForm(SearchUserType::class);

        return $this->render('main/admin.html.twig', array(
            'users' => $users,
            "actualites" => $actualites,
            'formActualite' => $formActualite->createView(),
            'formSearchUser' => $formSearchUser->createView(),
        ));
    }


    /**
     * @Route("/admin/delete_user", name="delete_user", options={"expose"=true})
     * @Method("GET")
     */
    public function deleteUserAction(Request $request) {

       if ($request->isXmlHttpRequest()) {
           $userId = $request->query->get('userId');
           $em = $this->getDoctrine()->getManager();
           $user = $em->getRepository('AppBundle:User')->find($userId);
           if ($user) {
               $em->remove($user);
               $em->flush();
               return new Response('Utilisateur bien supprimé', 200);
           } else {
               return new Response('Aucun utilisateur avec cet ID', 404);
           }
       } else {
           return $this->redirect($this->generateUrl('homepage'));
       }
    }

    /**
     * @Route("/admin/delete_actualite", name="delete_actualite", options={"expose"=true})
     * @Method("GET")
     */
    public function deleteActualiteAction(Request $request) {

        if ($request->isXmlHttpRequest()) {
            $actualiteId = $request->query->get('actualiteId');
            $em = $this->getDoctrine()->getManager();
            $actualite = $em->getRepository('AppBundle:Actualite')->find($actualiteId);
            if ($actualite) {
                $em->remove($actualite);
                $em->flush();
                return new Response('Actualité bien supprimée', 200);
            } else {
                return new Response('Aucune actualite avec cet ID', 404);
            }
        } else {
            return $this->redirect($this->generateUrl('homepage'));
        }
    }

    /**
     * @Route("/admin/set_role_naturaliste/{id}", name="set_role_naturaliste", requirements={"id" = "\d+"})
     */
    public function setRoleNaturalisteAction($id) {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find($id);
        $em->remove($user);
        $em->flush();
        return new Response("L'utilisateur a correctement été supprimée", 200);
    }


    /**
     * @Route("/admin/user/{username}", options={"expose"=true}, name="show_user")
     */
    public function showUsersAction($username) {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('AppBundle:User')->findAllByNameASCExceptAdmin();
        $usersStartingWith = $em->getRepository('AppBundle:User')->findAllUsernameStartingWith($username);

        if ($usersStartingWith) {
            $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
            $encoders = array(new JsonEncoder());
            $normalizers = array(new ObjectNormalizer($classMetadataFactory));
            $serializer = new Serializer($normalizers, $encoders);

            $jsonContent = $serializer->serialize($usersStartingWith, 'json', array('groups' => array('group1')));
            $response = new Response($jsonContent);
            $response->headers->set('Content-type', 'application/json');
            return $response;

        }else{
            $response = new JsonResponse();
            return $response->setData(array('response' => "Aucun utilisateur trouvé."));
        }

        $response = new JsonResponse();
        return $response->setData(array());
    }

    /**
     * @Route("/test/{username}", options={"expose"=true}, name="test")
     */
    public function testAction($username) {
        $em = $this->getDoctrine()->getManager();
        $usersStartingWith = $em->getRepository('AppBundle:User')->findAllUsernameStartingWith($username);
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer($classMetadataFactory));
        $serializer = new Serializer($normalizers, $encoders);

        $jsonContent = $serializer->serialize($usersStartingWith, 'json', array('groups' => array('group1')));

        die($jsonContent);
    }





}
