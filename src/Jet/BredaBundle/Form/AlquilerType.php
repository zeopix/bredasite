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
            'choices' => array('piso' => 'Piso', 'despacho' => 'Oficina', 'nave' => 'Nave industrial' )
                  ))

            ->add('titulo', 'text', array(
            'label' => 'Título'
        ))

            ->add('superficie', null, array(
            'label' => 'Superficie',
            'attr' => array('class' => 'input-small')
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
            ->add('destacado', 'choice', array(
            'label' => '¿Se trata de un alquiler destado?',
            'choices' => array(0 => 'No, no quiero destacar este alquiler', 1 => 'Sí se trata de un alquiler destacado'),

        ))
            ->add('descipcion', 'textarea', array(
            'label' => 'Descripción'
        ))


            ->add('extra', 'textarea', array(
            'label' => 'Parámetros adicionales',
            'required' => false,
        ));
    }

    public function getName()
    {
        return 'jet_bredabundle_alquilertype';
    }
}
