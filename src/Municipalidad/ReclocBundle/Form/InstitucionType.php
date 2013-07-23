<?php

namespace Municipalidad\ReclocBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Municipalidad\ReclocBundle\Form\AddInstitucionFieldSubscriber;
use Municipalidad\ReclocBundle\Form\AddRubroFieldSubscriber;
use Municipalidad\ReclocBundle\Form\AddServicioFieldSubscriber;

class InstitucionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        
        $builder
            ->add('nombre')
            ->add('prestacion')
            ->add('contactoPersona', null, array("label" => "Contacto"))
            ->add('mail')
            ->add('direccion')
            ->add('telefonos')
            ->add('horario')
            ->add('requisitos')
            ->add('observacion')
            ->add('rubro', null, array("auto_initialize" => "false"))
        ;
        
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Municipalidad\ReclocBundle\Entity\Institucion'
        ));
    }

    public function getName()
    {
        return 'municipalidad_reclocbundle_instituciontype';
    }
}
