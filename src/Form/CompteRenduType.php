<?php

namespace App\Form;

use App\Entity\CompteRendu;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompteRenduType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imageFile',FileType::class)
            ->add('commentairetud')
            ->add('etudiantcr',EntityType::class,[
                'class'=>User::class,
                'choice_label'=>'user_name'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CompteRendu::class,
        ]);
    }
}
