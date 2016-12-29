<?php

namespace EurotradeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('EurotradeBundle:Default:index.html.twig');
    }

    public function contactAction()
    {
        return $this->render('EurotradeBundle:Default:contact.html.twig');
    }

    public function quisommesAction()
    {
        return $this->render('EurotradeBundle:Default:quisommesnous.html.twig');
    }

}
