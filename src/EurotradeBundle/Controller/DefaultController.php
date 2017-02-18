<?php

namespace EurotradeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use EurotradeBundle\Form\contactType;
use EurotradeBundle\Entity\Task;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Regex;

use Symfony\Component\Form\Extension\Core\Type\DateType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Eurotrade/Default/index.html.twig');
    }

    public function contactAction()
    {
//
//
//        $session = $this->get('request')->getSession();
//        $details = $session->get('details');
//
//        $session->set('details', array(
//            'name' => $name,
//            'email' => $email,
//            'phone' => $phone,
//            'message' => $message
//        ));
//
//
//        $name = $details['name'];
//        $email = $_POST['email'];
//        $phone = $_POST['phone'];
//        $message = $_POST['message'];
//
//        dump($name);die();
//
//
////        $name = $_POST['name']; // required
////        $email = $_POST['email']; // required
////        $phone = $_POST['phone']; // required
////        $message = $_POST['mesage']; // required
//
//
        return $this->render('@Eurotrade/Default/contact.html.twig');
    }

//    public function contactAction(Request $request)
//    {
//        // Create the form according to the FormType created previously.
//        // And give the proper parameters
//        $form = $this->createForm('EurotradeBundle\Form\contactType',null,array(
//            // To set the action use $this->generateUrl('route_identifier')
//            'action' => $this->generateUrl('eurotrade_contact'),
//            'method' => 'POST'
//        ));
//
//        if ($request->isMethod('POST')) {
//            // Refill the fields in case the form is not valid.
//            $form->handleRequest($request);
//
//            if($form->isValid()){
//                // Send mail
//                if($this->sendEmail($form->getData())){
//
//                    // Everything OK, redirect to wherever you want ! :
//
//                    return $this->redirectToRoute('eurotrade_contact');
//                }else{
//                    // An error ocurred, handle
//                    var_dump("Errooooor :(");
//                }
//            }
//        }
//
//        return $this->render('@Eurotrade/Default/contact.html.twig', array(
//            'form' => $form->createView()
//        ));
//    }
//
//    private function sendEmail($data){
//        $myappContactMail = 'testswift@laposte.net';
//        $myappContactPassword = 'Phrasedepasse1';
//
//        // In this case we'll use the ZOHO mail services.
//        // If your service is another, then read the following article to know which smpt code to use and which port
//        // http://ourcodeworld.com/articles/read/14/swiftmailer-send-mails-from-php-easily-and-effortlessly
//        $transport = \Swift_SmtpTransport::newInstance('smtp.zoho.com', 465,'ssl')
//            ->setUsername($myappContactMail)
//            ->setPassword($myappContactPassword);
//
//        $mailer = \Swift_Mailer::newInstance($transport);
//
//        $message = \Swift_Message::newInstance("Our Code World Contact Form ". $data["subject"])
//            ->setFrom(array($myappContactMail => "Message by ".$data["name"]))
//            ->setTo(array(
//                $myappContactMail => $myappContactMail
//            ))
//            ->setBody($data["message"]."<br>ContactMail :".$data["email"]);
//
//        return $mailer->send($message);
//    }
//
//





//    public function sendAction(Request $request)
//    {
//        $from = $this->getParameter('mailer_user');
//// Instanciation des variables name, firstname, mail, sujet, msg pour récupérer la data
//        $name = $request->request->get('nom');
//        $firstname = $request->request->get('prenom');
//        $email = $request->request->get('email');
//        $sujet = $request->request->get('Sujet');
//        $msg = $request->request->get('msg');
//// Instanciation d'un nouveau message vers l'administrateur avec la prise en compte des variables
//        $message = \Swift_Message::newInstance()
//            ->setSubject('Contact Chouettes')
//            ->setFrom(array($from => 'ChouettesHiboux'))
//            ->setTo($from)
//            ->setBody(
//                $this->renderView(
//                    '@Chouettes/user/mail.html.twig',
//                    array(
//                        'nom' => $name,
//                        'prenom' => $firstname,
//                        'mail' => $mail,
//                        'sujet' => $sujet,
//                        'message' => $msg
//                    )
//                ),
//                'text/html'
//            );
//
//// Instanciation d'un nouveau message vers l'utilisateur avec la prise en compte des variables
//        $message2 = \Swift_Message::newInstance()
//            ->setSubject('Copie Contact Chouettes')
//            ->setFrom(array($from => 'ChouettesHiboux'))
//            ->setTo($mail)
//            ->setBody(
//                $this->renderView(
//                    '@Chouettes/user/mail2.html.twig',
//                    array(
//                        'nom' => $name,
//                        'prenom' => $firstname,
//                        'mail' => $mail,
//                        'sujet' => $sujet,
//                        'message' => $msg
//                    )
//                ),
//                'text/html'
//            );
//        $this->get('mailer')->send($message);
//        $this->get('mailer')->send($message2);
//// Ajout message sur page d'accueil pour informé de l'envoi du mail
//        $this->addFlash(
//            'notice',
//            'Votre message a bien été envoyé'
//        );
//        return $this->redirectToRoute('chouettes_homepage');
//
//    }


    public function nosMetiersAction()
    {
        return $this->render('EurotradeBundle:Default:nosmétiers.html.twig');
    }
    public function rejoignezNousAction()
    {
        return $this->render('EurotradeBundle:Default:rejoigneznous.html.twig');
    }
    public function quisommesAction()
    {
        return $this->render('EurotradeBundle:Default:quisommesnous.html.twig');
    }

}
