<?php

namespace Municipalidad\ReclocBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ServicioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Municipalidad\ReclocBundle\Entity\Servicio'
        ));
    }

    public function getName()
    {
        return 'municipalidad_reclocbundle_serviciotype';
    }
}
