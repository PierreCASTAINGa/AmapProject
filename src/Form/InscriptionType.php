<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            // ->add('prenom')
            // ->add('groupe')
            // ->add('adresse')
            // ->add('cp')
            // ->add('ville')
            // ->add('telFixe')
            // ->add('telPort1')
            // ->add('telPort2')
            ->add('email')
            ->add('confirm_email')
            // ->add('actif')
            ->add('identifiant')
            ->add('password', PasswordType::class)
            ->add('confirm_password', PasswordType::class);
            // ->add('charteAcceptee')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
