<?php

namespace App\Form;

use App\Entity\Employe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Cin')
            ->add('Nom')
            ->add('Prenom')
            ->add('Cnss')
            ->add('SituationFam')
            ->add('NombreEnfant')
            ->add('Email')
            ->add('tele')
            ->add('Adresse')
            ->add('Photos')
            ->add('DateNaiss')
            ->add('DateEntree')
            ->add('dateSortie')
            ->add('StatueTravaille')
            ->add('Echelle')
            ->add('Echellon')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employe::class,
        ]);
    }
}