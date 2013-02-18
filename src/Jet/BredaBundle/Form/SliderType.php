<?php

namespace Jet\BredaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class SliderType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('file')

        ;
    }

    public function getName()
    {
        return 'jet_bredabundle_fototype';
    }
}
