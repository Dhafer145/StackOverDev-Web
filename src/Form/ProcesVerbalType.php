<?php

namespace App\Form;

use App\Entity\ProcesVerbal;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class ProcesVerbalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date')
            ->add('membre_reunion')
            ->add('Description')
            ->add('pvUser',EntityType::class,[
                'class'=>User::class,
                'choice_label'=>'user_name'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ProcesVerbal::class,
        ]);
    }
}
