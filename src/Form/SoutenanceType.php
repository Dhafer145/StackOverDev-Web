<?php

namespace App\Form;

use App\Entity\Soutenance;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SoutenanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('president')
            ->add('date_soutenance')

            ->add('salle', ChoiceType::class,[

                'choices'=>[
                    'A01',
                    'B01',
                    'C01',
                   ]])



            ->add('sout_enc_ac',EntityType::class,[
        'class'=>User::class,
        'choice_label'=>'user_name'])

            ->add('sout_etud',EntityType::class,[
        'class'=>User::class,
        'choice_label'=>'user_name']);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Soutenance::class,
        ]);
    }
}
