<?php

namespace Compufix\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('username', 'text', array(
                    'attr' => array(
                        'class' => 'span6',
                        'autocomplete' => 'off'
                    )
                ))
                ->add('sexo', 'choice', array(
                    'choices' => array('m' => 'Hombre', 'f' => 'Mujer'),
                    'required' => true,
                ))
                ->add('fechanace', 'date', array(
                    'label' => 'Birthday:',
                    'years' => range(date('Y'), date('Y') - 100),
                    'attr' => array(
                        'class' => 'input-xlarge datepicker hasDatepicker',
                        'autocomplete' => 'off'
                    )
                ))
                ->add('roles', 'choice', array(
                    'choices' => array(
                        'ROLE_ADMIN' => 'ROLE_ADMIN',
                        'ROLE_USER' => 'ROLE_USER',
                    ),
                    'property_path' => false,
                    'multiple' => true,
                ))
                ->add('email', 'text', array(
                    'attr' => array(
                        'class' => 'span6',
                        'autocomplete' => 'off'
                    )
                ))
                /*       ->add('enabled', 'choice', array(
                  'choices' => array('1' => 'No necesita confirmación por email', '0' => 'Requiere confirmación por email'),
                  'attr' => Array(
                  'class' => 'span6',
                  'data-rel' => 'popover',
                  'data-content' => 'Especifica si el usuario requiere o no ingresar al email para la activación de su cuenta',
                  'title' => 'Ayuda',
                  ),
                  'required' => true,)) */
                ->add('plainPassword', 'repeated', array(
                    'type' => 'password',
                    'options' => array('translation_domain' => 'FOSUserBundle'),
                    'first_options' => array('label' => 'form.password', 'attr' => array(
                            'class' => 'span6',
                        ),),
                    'second_options' => array('label' => 'form.password_confirmation', 'attr' => array(
                            'class' => 'span6',
                        ),),
                    'invalid_message' => 'fos_user.password.mismatch',
                ))
                //  ->add('groups')
                ->add('locked', 'choice', array(
                    'choices' => array('0' => 'Permitir acceso al sistema', '1' => 'Denegar acceso al sistema'),
                    'attr' => Array(
                        'class' => 'span6',
                        'data-rel' => 'popover',
                        'data-content' => 'Permite Bloquear el ingreso de este usuario al sistema, esta acción se podrá cambiar desde el administrador de usuarios',
                        'title' => 'Ayuda',
                    ),
                    'required' => true,))

        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Compufix\UserBundle\Entity\User'
        ));
    }

    public function getName() {
        return '_user_admin';
    }

}
