<?php

namespace Municipalidad\ReclocBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Municipalidad\ReclocBundle\Entity\Servicio;
use Municipalidad\ReclocBundle\Form\ServicioType;
use \DateTime;

class ServicioController extends Controller
{
    public function mostrarAction()
    {
    }

    public function indexAction()
    {
        $em = $this->get('doctrine')->getManager();
        
        $request = $this->get('request');
        $servicios = $em->getRepository('ReclocBundle:Servicio')->findAll();
                    
        return $this->render('ReclocBundle:Servicio:index.html.twig', array(
            "servicios" => $servicios,
        ));
    }

    public function nuevoAction()
    {
        
        $servicio = new Servicio();
        $form = $this->get('form.factory')->create(
                new ServicioType(),
                $servicio
        );
                
        $request = $this->get('request');
        if ($request->getMethod() == 'POST'){
            $form->bind($request);
            if ($form->isValid()){
                // Obtenemos el usuario
                $servicio = $form->getData();

                
                // Guardamos el objeto en base de datos
                $em = $this->get('doctrine')->getManager();
                $em->persist($servicio);
                $em->flush();
                
                return $this->redirect($this->generateUrl('nuevo_servicio'));
            }
         }
         return $this->render('ReclocBundle:Servicio:nuevo.html.twig',
                array( 'form' => $form->createView(),
                ));

        
    }

    public function editarAction($id)
    {
        $peticion = $this->get('request');
        $em = $this->get('doctrine')->getManager();
        
        if (null == $servicio = $em->find('ReclocBundle:Servicio', $id)) {
            throw new NotFoundHttpException('No existe el Servicio que se quiere modificar');
        }
        
        $form = $this->get('form.factory')->create(
                new ServicioType(),
                $servicio
        );
        
        $form->setData($servicio);
        
        if ($peticion->getMethod() == 'POST') {
            $form->bind($peticion);

            if ($form->isValid()) {
                $servicio->setFechaActualizado(new DateTime('NOW'));
                $em->persist($servicio);
                $em->flush();

                return $this->redirect($this->generateUrl('index_servicio'));
            }
        }
        
        return $this->render('ReclocBundle:Servicio:editar.html.twig', array(
            'form' => $form->createView(),
            'servicio' => $servicio
        ));
    }
    
    public function borrarAction($id)
    {
        $em = $this->get('doctrine')->getManager();

        if (null == $servicio = $em->find('ReclocBundle:Servicio', $id)) {
            throw new NotFoundHttpException('No existe el servicio que quiere borrar');
        }
        $em->remove($servicio);
        $em->flush();
        return $this->redirect($this->generateUrl('index_servicio'));  
    }

}
