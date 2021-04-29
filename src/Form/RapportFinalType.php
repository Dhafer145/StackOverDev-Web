<?php

namespace App\Form;

use App\Entity\RapportFinal;
use App\Entity\User;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;


class RapportFinalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('plagiat')
            ->add('imageFile',VichImageType::class)

            ->add('rapp_etudiant',EntityType::class,[
            'class'=>User::class,
            'choice_label'=>'user_name'
              ])

            ->add('enc_ac_correction',EntityType::class,[
            'class'=>User::class,
            'choice_label'=>'user_name'
              ])
               ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RapportFinal::class,
        ]);
    }
}
