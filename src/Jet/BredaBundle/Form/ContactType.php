<?php

namespace Jet\BredaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('persona', 'text', array(
            'label' => 'Persona de Contacto',
            'attr' => array('class' => 'input-xlarge')
        ))

            ->add('email', 'text', array(
            'label' => 'Correo Electrónico',
            'attr' => array('class' => 'input-xlarge')
        ))

            ->add('telefono', 'text', array(
            'label' => 'Teléfono',
            'attr' => array('class' => 'input-xlarge')
        ))
            ->add('consulta', 'textarea', array(
            'label' => 'Consulta',
            'attr' => array('class' => 'input-xxlarge','rows'=>10)
        ));
    }

    public function getName()
    {
        return 'jet_bredabundle_contacttype';
    }
}
