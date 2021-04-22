<?php

namespace App\Form;

use App\Entity\PropositionProjet;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropositionProjetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom_sujet')
            ->add('imageFile',FileType::class)
            ->add('description')
            ->add('etudiantpp',EntityType::class,[
                'class'=>User::class,
                'choice_label'=>'user_name'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PropositionProjet::class,
        ]);
    }
}
