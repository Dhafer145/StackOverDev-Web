<?php

namespace App\Form;

use App\Entity\Soutenance;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SoutenanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('president')
            ->add('date_soutenance')
            ->add('salle')
            ->add('soutenancers')
            ->add('sout_enc_ac')
            ->add('sout_etud')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Soutenance::class,
        ]);
    }
}
