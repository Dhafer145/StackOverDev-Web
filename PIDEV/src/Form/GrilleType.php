<?php

namespace App\Form;

use App\Entity\Grille;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GrilleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder


            ->add('mention')
            ->add('note')
            ->add('q1')
            ->add('q2')
            ->add('q3')
            ->add('q4')
            ->add('q5')
            ->add('q6')
            ->add('q7')
            ->add('q8')
            ->add('enc_academique',EntityType::class,[
                'class'=>User::class,
                'choice_label'=>'user_name'
            ])
            ->add('grille_etudiant',EntityType::class,[
                'class'=>User::class,
                'choice_label'=>'user_name'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Grille::class,
        ]);
    }
}
