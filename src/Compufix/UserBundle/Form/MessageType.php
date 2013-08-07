<?php

namespace Compufix\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('userRemitente')
            ->add('fechaenvio')
            ->add('prioridad')
            ->add('asunto')
            ->add('contenido')
            ->add('leido')
            ->add('fechaleido')
            ->add('userleido')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Compufix\UserBundle\Entity\Message'
        ));
    }

    public function getName()
    {
        return 'compufix_userbundle_messagetype';
    }
}
