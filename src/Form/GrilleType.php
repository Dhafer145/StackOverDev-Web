<?php

namespace App\Form;

use App\Entity\Grille;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GrilleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder


            ->add('mention', null,[
                'attr' => [

                    'type'=>"text",
                    'name'=>"mention" ,
                    'id'=>"mention",
                    'placeholder'=>"MENTION"
                ]])

            ->add('note', null,[
                'attr' => [

                    'type'=>"text",
                    'name'=>"note",
                    'id'=>"note",
                    'placeholder'=>"NOTE"
                ]])

            ->add('q1', null,[
                'attr' => [
                    'class'=> 'form-control',
                    'type'=>"text",
                    'name'=>"q1",
                    'id'=>"q1",
                    'placeholder'=>"Q1"
                ]])

            ->add('q2', null,[
                'attr' => [
                    'class'=> 'form-control',
                    'type'=>"text",
                    'name'=>"q2",
                    'id'=>"q2",
                    'placeholder'=>"Q2"
                ]])

            ->add('q3', null,[
                'attr' => [
                    'class'=> 'form-control',
                    'type'=>"text",
                    'name'=>"q3",
                    'id'=>"q3",
                    'placeholder'=>"Q3"
                ]])

            ->add('q4', null,[
                'attr' => [
                    'class'=> 'form-control',
                    'type'=>"text",
                    'name'=>"q4",
                    'id'=>"q4",
                    'placeholder'=>"Q4"
                ]])

            ->add('q5', null,[
                'attr' => [
                    'class'=> 'form-control',
                    'type'=>"text",
                    'name'=>"q5",
                    'id'=>"q5",
                    'placeholder'=>"Q5"
                ]])

            ->add('q6', null,[
                'attr' => [
                    'class'=> 'form-control',
                    'type'=>"text",
                    'name'=>"q6",
                    'id'=>"q6",
                    'placeholder'=>"Q6"
                ]])

            ->add('q7', null,[
                'attr' => [
                    'class'=> 'form-control',
                    'type'=>"text",
                    'name'=>"q7",
                    'id'=>"q7",
                    'placeholder'=>"Q7"
                ]])

            ->add('q8', null,[
                'attr' => [
                    'class'=> 'form-control',
                    'type'=>"text",
                    'name'=>"q8",
                    'id'=>"q8",
                    'placeholder'=>"Q8"
                ]])

            ->add('enc_academique',EntityType::class,[
                'class'=>User::class,
                'choice_label'=>'user_name'
            ])
            ->add('grille_etudiant',EntityType::class,[
                'class'=>User::class,
                'choice_label'=>'user_name'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Grille::class,
        ]);
    }
}
