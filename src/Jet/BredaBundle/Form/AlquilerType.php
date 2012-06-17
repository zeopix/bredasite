<?php

namespace Jet\BredaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class AlquilerType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder

            ->add('tipo','choice',array(
                      'label' => 'Tipo de inmueble',
            'choices' => array('piso' => 'Piso', 'despacho' => 'Despacho', 'nave' => 'Nave industrial' )
                  ))

            ->add('poblacion', 'text', array(
            'label' => 'Población'
        ))
            ->add('postal', 'text', array(
                     'label' => 'Código postal'
                 ))
            ->add('direccion', 'text', array(
                      'label' => 'Dirección del inmueble'
                  ))
            ->add('descipcion','textarea',array(
            'label' => 'Descripción'
        ))



            ->add('extra', 'textarea', array(
            'label' => 'Parámetros adicionales',
            'required' => false,
        ))
        ;
    }

    public function getName()
    {
        return 'jet_bredabundle_alquilertype';
    }
}
