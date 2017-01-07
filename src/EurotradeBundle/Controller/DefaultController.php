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

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('EurotradeBundle:Default:index.html.twig');
    }

    public function contactAction(Request $request)
    {
        $name = $email = $phone = $message = NULL;

        $form = $this->createFormBuilder()
            ->add('name', textType::class, array('constraints' => array(new NotBlank(array('message' => 'test'
            )))))
            ->add('email', TextType::class,  array('constraints' => array(new Assert\Email(array('checkMX' => true)),
                                                                          new NotBlank(),)))
            ->add('phone', TextType::class,  array('constraints' => array(new Assert\Email(array('checkMX' => true)),
                new NotBlank(),)))
            ->add('message')
            ->add('send', SubmitType::class , array('label' => 'OK'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid())
        {
            $name=$form["name"]->getData();
            $email=$form["email"]->getData();
            $phone=$form["phone"]->getData();
            $message=$form["message"]->getData();
            $this->SendMail($name, $email, $phone, $message);
        }


        


        return $this->render('EurotradeBundle:Default:contact.html.twig', array('form'    => $form->createView(),
                                                                                'name'    => $name,
                                                                                'email'   => $email,
                                                                                'phone'   => $phone,
                                                                                'message' => $message));





//        ->add('firstname', TextType::class, array('constraints' => array(new NotBlank(array(//'message' => 'contact.error.firstname'
//    ))
//    ,new Length(array('min' => 3,
//            'max' => 10,
//            //'minMessage' => 'contact.error.firstnamemin,
//            //'maxMessage' => 'contact.error.firstnamemax'
//        )))))
//        ->add('lastname', TextType::class, array('constraints' => array(new NotBlank(array(//'message' => 'contact.error.lastname'
//        ))
//        ,new Length(array('min' => 3,
//                'max' => 10,
//                //'minMessage' => 'contact.error.lastnamemin',
//                //'maxMessage' => 'contact.error.lastnamemax'
//            )))))
//        ->add('email', TextType::class,  array('constraints' => array(new Assert\Email(array('checkMX' => true)),
//            new NotBlank(),)))
////        ->add('email', EmailType::class, array('constraints' => array(new Assert\Email(array(//'message' => 'contact.error.email',
//        //          											'checkMX' => true)))))
//        /*
//            ->add('object', ChoiceType::class, array('choices' => array('' => '','Autre' => "Autre",'Bug' => "Bug", 'Demande' => "Demande"))
//                             , array('constraints' => array(new NotBlank(array(//'message' => 'contact.error.lastname'
//        )))))
//        */
//        ->add('object', ChoiceType::class, array('choices' => array('' => '','Autre' => "Autre",'Bug' => "Bug", 'Demande' => "Demande")),
//            array('constraints' => array(new Length(array('min' => 3)))))
//        ->add('message', TextareaType::class, array('constraints' => array(new NotBlank(array(//'message' => 'contact.error.messagenotblank'
//        ))
//        ,new Length(array('min' => 8,
//                'max' => 10,
//                // 'minMessage' => 'contact.error.messagemin',
//                // 'maxMessage' => 'contact.error.messagemax'
//            )))))
//



//        $form = $this->createForm('EurotradeBundle\Form\contactType');
//        $form->handleRequest($request);
//        $table['form'] = $form->createView();
//        $send=false;
//        $table['send'] = $send;
//        if ($form->isSubmitted() && $form->isValid())
//        {
//            $subject = $form->get('subject')->getData();
//            $from = $form->get('from')->getData();
//            $body = $form->get('body')->getData();
//            $this->sendMail($subject,$from,$body);
//            // permet de savoir si le questionnaire a été envoyé
//            $send=true;
//            $table['send'] = $send;
//            // on efface le questionnaire et on en créé un nouveau pour qu'à l'envoi les champs soient reset
//            unset($form);
//            $form = $this->createForm('HarasBundle\Form\contactType', $page);
//            $table['form'] = $form->createView();
//            return $this->render('@Haras/contact.html.twig', $table);
//        }
//        return $this->render('@Haras/contact.html.twig', $table);
//    }
//
//    else if ($name == 'login'){
//        return $this->redirectToRoute('fos_user_security_login');
//    }
//
//        // renvoi par défaut si non template et non contact
//        return $this->render('HarasBundle::'.$name.'.html.twig', $table);
//    }
//
//    // envoi de mail de la page contact
//    public function sendMail($subject, $from, $body)
//    {
//        $message = \Swift_Message::newInstance()
//            ->setSubject($subject)
//            ->setFrom($from)
//            ->setTo('michael.combescot@gmail.com')
//            ->setBody($body)
//        ;
//        $this->get('mailer')->send($message);
//    }
    }

    public function quisommesAction()
    {
        return $this->render('EurotradeBundle:Default:quisommesnous.html.twig');
    }

}
