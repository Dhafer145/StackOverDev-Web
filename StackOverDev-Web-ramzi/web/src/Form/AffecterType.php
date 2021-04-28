<?php

namespace App\Form;

use App\Entity\Affecter;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AffecterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom_etudiant',EntityType::class,[
                'class'=>user::class,
                'choice_label'=>'user_name'
            ])

            ->add('nom_encadrant_academique',EntityType::class,[
                'class'=>user::class,
                'choice_label'=>'user_name'
            ])
            ->add('nom_encadrant_entreprise',EntityType::class,[
                'class'=>user::class,
                'choice_label'=>'user_name'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Affecter::class,
        ]);
    }
}
