<?php

namespace Compufix\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cedula')
            ->add('apellidopaterno')
            ->add('apellidomaterno')
            ->add('firstname')
            ->add('secondname')
            ->add('direccion')
            ->add('telefonocasa')
            ->add('telefonocelular')
            ->add('lugarnacimiento')
            ->add('sexo')
            ->add('estadocivil')
            ->add('tiposangre')
            ->add('profesion')
            ->add('nivelestudio')
            ->add('image')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Compufix\UserBundle\Entity\Persona'
        ));
    }

    public function getName()
    {
        return 'compufix_userbundle_personatype';
    }
}
