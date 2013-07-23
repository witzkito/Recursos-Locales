<?php

namespace Municipalidad\ReclocBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Municipalidad\ReclocBundle\Entity\Rubro;
use Municipalidad\ReclocBundle\Form\RubroType;
use \DateTime;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RubroController extends Controller
{
    
    public function indexAction($id_servicio)
    {
        $em = $this->get('doctrine')->getManager();
        
        $request = $this->get('request');
        $rubros = $em->getRepository('ReclocBundle:Rubro')->findby(array("servicio" => $id_servicio));
                    
        return $this->render('ReclocBundle:Rubro:index.html.twig', array(
            "rubros" => $rubros,
            "id_servicio" => $id_servicio,
        ));
    }
    
    public function nuevoAction($id_servicio)
    {
        $em = $this->get('doctrine')->getManager();
        
        $rubro = new Rubro();
        $servicio = $em->getRepository('ReclocBundle:Servicio')->findOneBy(array('id' => $id_servicio));
        $rubro->setServicio($servicio);
        $form = $this->get('form.factory')->create(
                new RubroType(),
                $rubro
        );
                
        $request = $this->get('request');
        if ($request->getMethod() == 'POST'){
            $form->bind($request);
            if ($form->isValid()){
                // Obtenemos el usuario
                $rubro = $form->getData();

                
                // Guardamos el objeto en base de datos
                $em = $this->get('doctrine')->getManager();
                $em->persist($rubro);
                $em->flush();
                
                return $this->redirect($this->generateUrl('nuevo_rubro', array('id_servicio' => $id_servicio)));
            }
         }
         return $this->render('ReclocBundle:Rubro:nuevo.html.twig',
                array( 'form' => $form->createView(),
                    'id_servicio' => $id_servicio,
                ));

    }
    
    public function editarAction($id, $id_servicio)
    {
        $peticion = $this->get('request');
        $em = $this->get('doctrine')->getManager();
        
        if (null == $rubro = $em->find('ReclocBundle:Rubro', $id)) {
            throw new NotFoundHttpException('No existe el Rubro que se quiere modificar');
        }
        
        $form = $this->get('form.factory')->create(
                new RubroType(),
                $rubro
        );
        
        $form->setData($rubro);
        
        if ($peticion->getMethod() == 'POST') {
            $form->bind($peticion);

            if ($form->isValid()) {
                $rubro->setFechaActualizado(new DateTime('NOW'));
                $em->persist($rubro);
                $em->flush();

                return $this->redirect($this->generateUrl('index_rubro', array('id_servicio' => $id_servicio)));
            }
        }
        
        return $this->render('ReclocBundle:Rubro:editar.html.twig', array(
            'form' => $form->createView(),
            'rubro' => $rubro,
            'id_servicio' => $id_servicio
        ));
        
    }
    
    public function borrarAction($id, $id_servicio)
    {
        $em = $this->get('doctrine')->getManager();

        if (null == $rubro = $em->find('ReclocBundle:Rubro', $id)) {
                throw new NotFoundHttpException('No existe el rubro que quiere borrar');
        }
        $em->remove($rubro);
        $em->flush();
        return $this->redirect($this->generateUrl('index_rubro', array('id_servicio' => $id_servicio)));  
    }
    
}
