<?php

namespace App\Form;

use App\Entity\PlanTravail;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlanTravailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imageFile1',FileType::class,['label'=>'backlog'])
            ->add('imageFile2',FileType::class,['label'=>'sprints'])
            ->add('etudiantpp',EntityType::class,[
                'class'=>User::class,
                'choice_label'=>'username'
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PlanTravail::class,
        ]);
    }
}
