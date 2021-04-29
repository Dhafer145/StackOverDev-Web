<?php

namespace App\Form;

use App\Entity\Evaluation;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvaluationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('ponctualite')
            ->add('comm1')
            ->add('integration')
            ->add('comm2')
            ->add('travail')
            ->add('comm3')
            ->add('competence')
            ->add('comm4')
            ->add('eg')
            ->add('comm5')

            ->add('id_enc_entreprise',EntityType::class,[
                'class'=>User::class,
                'choice_label'=>'user_name'
            ])
            ->add('eval_etudiant',EntityType::class,[
                'class'=>User::class,
                'choice_label'=>'user_name'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Evaluation::class,
        ]);
    }
}
