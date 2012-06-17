<?php

namespace Jet\BredaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class FotoType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('descripcion')

            ->add('file')

        ;
    }

    public function getName()
    {
        return 'jet_bredabundle_fototype';
    }
}
