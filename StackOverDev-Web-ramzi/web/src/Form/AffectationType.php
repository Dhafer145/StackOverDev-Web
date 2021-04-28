<?php

namespace App\Form;

use App\Entity\Affectation;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AffectationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom_etudiant')
            ->add('nom_encadrant_academique')
            ->add('nom_encadrant_entreprise')

            ->add('id_etudiant',EntityType::class,[
                'class'=>user::class,
                'choice_label'=>'user_name'
            ])

            ->add('id_encadrant_academique',EntityType::class,[
                'class'=>user::class,
                'choice_label'=>'user_name'
            ])

            ->add('id_encadrant_entreprise',EntityType::class,[
                'class'=>user::class,
                'choice_label'=>'user_name'
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Affectation::class,
        ]);
    }
}
