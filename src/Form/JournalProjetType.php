<?php

namespace App\Form;

use App\Entity\JournalProjet;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JournalProjetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date' ,DateType::class, [
        // renders it as a single text box
        'widget' => 'single_text',
    ])
            ->add('tache')
            ->add('avis')
            ->add('etudiantjp',EntityType::class,[
                'class'=>User::class,
                'choice_label'=>'username'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => JournalProjet::class,
        ]);
    }
}
