<?php

namespace App\Form;

use App\Entity\Questions;
use App\Entity\Reponses;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReponsesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rep')
            ->add('reps_etud',EntityType::class,['class'=>User::class,'choice_label'=>'user_name'])
            ->add('question_des_reponses',EntityType::class,['class'=>Questions::class,'choice_label'=>'quest'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reponses::class,
        ]);
    }
}
