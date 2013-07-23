<?php

namespace Municipalidad\ReclocBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Municipalidad\ReclocBundle\Entity\Institucion;
use Municipalidad\ReclocBundle\Form\InstitucionType;
use \DateTime;

class InstitucionController extends Controller
{
    
    public function indexAction($id_rubro)
    {
        $em = $this->get('doctrine')->getManager();
        
        $request = $this->get('request');
        $instituciones = $em->getRepository('ReclocBundle:Institucion')->findby(array("rubro" => $id_rubro));
                    
        return $this->render('ReclocBundle:Institucion:index.html.twig', array(
            "instituciones" => $instituciones,
            "id_rubro" => $id_rubro,
        ));
    }
    
     public function nuevoAction($id_rubro)
    {
        $em = $this->get('doctrine')->getManager();
        
        $inst = new Institucion();
        $rubro = $em->getRepository('ReclocBundle:Rubro')->findOneBy(array('id' => $id_rubro));
        $inst->setRubro($rubro);
        $form = $this->get('form.factory')->create(
                new InstitucionType(),
                $inst
        );
                
        $request = $this->get('request');
        if ($request->getMethod() == 'POST'){
            $form->bind($request);
            if ($form->isValid()){
                // Obtenemos el usuario
                $inst = $form->getData();

                
                // Guardamos el objeto en base de datos
                $em = $this->get('doctrine')->getManager();
                $em->persist($inst);
                $em->flush();
                
                return $this->redirect($this->generateUrl('nuevo_institucion', array('id_rubro' => $id_rubro)));
            }
         }
         return $this->render('ReclocBundle:Institucion:nuevo.html.twig',
                array( 'form' => $form->createView(),
                    'rubro' => $rubro,
                ));

    }
    
    public function editarAction($id, $id_rubro)
    {
        $peticion = $this->get('request');
        $em = $this->get('doctrine')->getManager();
        
        if (null == $inst = $em->find('ReclocBundle:Institucion', $id)) {
            throw new NotFoundHttpException('No existe la institucion se quiere modificar');
        }
        
        $form = $this->get('form.factory')->create(
                new InstitucionType(),
                $inst
        );
        
        $form->setData($inst);
        
        if ($peticion->getMethod() == 'POST') {
            $form->bind($peticion);

            if ($form->isValid()) {
                $inst->setFechaActualizado(new DateTime('NOW'));
                $em->persist($inst);
                $em->flush();

                return $this->redirect($this->generateUrl('index_institucion', array('id_rubro' => $id_rubro)));
            }
        }
        
        return $this->render('ReclocBundle:Institucion:editar.html.twig', array(
            'form' => $form->createView(),
            'institucion' => $inst,
            'id_rubro' => $id_rubro
        ));
        
    }
    
    public function borrarAction($id, $id_rubro)
    {
        $em = $this->get('doctrine')->getManager();

        if (null == $inst = $em->find('ReclocBundle:Institucion', $id)) {
                throw new NotFoundHttpException('No existe la institucion que quiere borrar');
        }
        $em->remove($inst);
        $em->flush();
        return $this->redirect($this->generateUrl('index_institucion', array('id_rubro' => $id_rubro)));  
    }
    
}
