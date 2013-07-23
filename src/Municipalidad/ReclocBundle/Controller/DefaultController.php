<?php

namespace Municipalidad\ReclocBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    
    public function indexAction()
    {
        $em = $this->get('doctrine')->getManager();
        
        $request = $this->get('request');
        $servicios = $em->getRepository('ReclocBundle:Servicio')->findAll();
                    
        return $this->render('ReclocBundle:Default:index.html.twig', array(
            "servicios" => $servicios,
        ));
    }
}
