<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Actualite;
use AppBundle\Entity\User;
use AppBundle\Entity\Comment;
use AppBundle\Form\ChangeEmailType;
use AppBundle\Form\ChangePasswordType;
use AppBundle\Form\ChangePseudoType;
use AppBundle\Form\CommentType;
use AppBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Routing\Annotation;
use Symfony\Component\Serializer\Encoder\JsonEncoder;



class MainController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function homeAction()
    {
        return $this->render('main/home.html.twig');
    }

    /**
     * @Route("/observation", name="observation")
     */
    public function observationAction(Request $request)
    {

        if (!$this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            $this->addFlash('notice', 'Vous devez-être connecté pour ajouter une observation.');
            return $this->redirectToRoute('security_login');
        }
        return $this->render('main/observation.html.twig');

    }

    /**
     * @Route("/actualites", name="actualites")
     */
    public function actualitesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $actualites = $em->getRepository(Actualite::class)->findAll();

        return $this->render('main/actualites.html.twig', array(
            'actualites' => $actualites
        ));
    }

    /**
     * @Route("/actualite/{id}", name="actualite", requirements={"id" = "\d+"})
     */
    public function actualiteAction(Actualite $actualite, Request $request)
    {
        $user = $actualite->getUser();
        $comments = $actualite->getComments();
        $comment = New Comment();
        $comment->setActualite($actualite);

        $formComment = $this->createForm(CommentType::class, $comment);
        $formComment->handleRequest($request);

        return $this->render('main/actualite.html.twig', array(
            'actualite' => $actualite,
            'user' => $user,
            'comments' => $comments,
            'formComment' => $formComment->CreateView()
        ));
    }

    /**
     * @Route("add/comment/{id}", requirements={"id" = "\d+"}, name="addComment")
     * @Method({"POST"})
     */
    public function addCommentAction(Request $request, $id)
    {
        $user = $this->getUser();
        if ($request->isXmlHttpRequest()) {
            if ($user === null) {
                throw $this->createNotFoundException("Aucun utilisateur n'est connecté");
            } else {
                $em = $this->getDoctrine()->getManager();
                $comments = $em->getRepository("AppBundle:Comment")->findByActualite($id);
                dump($comments);
                dump(json_encode($comments));
                return new JsonResponse(array('data' => json_encode($comments)));
            }
        } else {

            return new Response("Erreur: Ce n'est pas une requête AJAX", 400);
        }
    }


    /**
     * @Route("/admin", name="admin")
     */
    public function adminAction()
    {
        return $this->render('NAOMainBundle:Main:admin.html.twig');
    }

    /**
     * @Route("/profile", name="profile")
     */
    public function profileAction(Request $request)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $formChangePseudo = $this->createForm(ChangePseudoType::class, $user);
        $formChangePassword = $this->createForm(ChangePasswordType::class, $user);
        $formChangeEmail = $this->createForm(ChangeEmailType::class, $user);
        $formChangeEmail->handleRequest($request);
        if ($formChangeEmail->isValid() && $formChangeEmail->isSubmitted()) {
            $em->persist($user);
            $em->flush();
            $this->addFlash('notice','Votre Email à bien été modifié :)');
            return $this->redirectToRoute('profile');
        }
        $formChangePseudo->handleRequest($request);
        if($formChangePseudo->isValid() && $formChangePseudo->isSubmitted()) {
            $em->persist($user);
            $em->flush();
            $this->addFlash('success','Votre Pseudo à bien été modifié :)');
            return $this->redirectToRoute('profile');
        }

        $observations = $em->getRepository("AppBundle:Observation")->findAll();
        $waitingObservations = $em->getRepository("AppBundle:Observation")->findAllWaiting();
        $userObservations = $user->getObservations();

        return $this->render('main/profile.html.twig', array(
            'formChangePassword' => $formChangePassword->createView(),
            'formChangeEmail' => $formChangeEmail->createView(),
            'formChangePseudo' => $formChangePseudo->createView(),
            'user' => $user,
            'userObservations' => $userObservations,
            'observations' => $observations,
            'waitingObservations' => $waitingObservations
        ));
    }

    /**
     * @Route("/apropos", name="aPropos")
     */
    public function aProposAction()
    {

        return $this->render('main/apropos.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction(Request $request)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if($form->isValid() && $form->isSubmitted()) {
            $naoContact = "gchurlet@gmail.com";
            $userEmail = $form->getData()['mail'];
            $subject = $form->getData()['subject'];
            $content = $form->getData()['message'];
            $sendConfirmationMail = $this->get('app.mail.send_contact_mail');
            $sendConfirmationMail->sendContactMail($userEmail, $subject, $content, $naoContact);
            $this->addFlash('success', "Félicitation votre email à bien été envoyé. Nous essaierons d'y répondre au plus vite");
            return $this->redirectToRoute('contact');
        }

        return $this->render('main/contact.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/observation/denied/{id}",requirements={"id" = "\d+"}, name="observationDenied")
     * @Method({"POST"})
     */
    public function observationDeniedAction($id) {
        $em = $this->getDoctrine()->getManager();
        $observation = $em->getRepository('AppBundle:Observation')->find($id);
        $em->remove($observation);
        $em->flush();
        return new Response('message', "L'observation a correctement été supprimée");
    }

    /**
     * @Route("/faq", name="faq")
     */
    public function faqAction()
    {
        return $this->render('main/faq.html.twig');
    }

    /**
     * @Route("/oiseaux", name="oiseaux")
     */
    public function oiseauxAction() {
        $em = $this->getDoctrine()->getManager();
        $birds = $em->getRepository('AppBundle:Bird')->findAllByNameAsc();
        return $this->render('main/oiseaux.html.twig', [
            'birds' => $birds
        ]);
    }

}

