<?php

namespace App\Form;


use App\Entity\Categorie;
use App\Entity\SuperCategorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategorieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id')
            ->add('nom')
            ->add('nbCheque')
            ->add('nbChequeFixe')
            ->add('remarque')
            ->add('actif')
            ->add('urlImg')
            ->add('descriptionProduits')
            ->add('SuperCategorie', EntityType::class, array(
                 
                'class' => SuperCategorie::class,
                'choice_label' => function ($superCategorie) {
                    return $superCategorie->getNom();
                }
                ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Categorie::class,
        ]);
    }
}
