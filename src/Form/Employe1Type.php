<?php

namespace App\Form;

use App\Entity\Employe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class Employe1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('Cin', TextType::class,[
            'attr' => ['class' => 'form-control']],)
        ->add('Nom', TextType::class,[
            'attr' => ['class' => 'form-control']],)
        ->add('Prenom', TextType::class,[
            'label'=>'Prénom',
            'attr' => ['class' => 'form-control']],)
        ->add('Cnss', TextType::class,[
            'attr' => ['class' => 'form-control']],)
        ->add('SituationFam', ChoiceType::class, [
            'label'=>'Situation Familiale',
            'choices'  => [
                'Célibataire' => 'Célibataire',
                'Marié(e)' => 'Marié(e)',
                'Divorcé(e)' => 'Divorcé(e)',
                'veuf' => 'veuf',
            ],
        ])


        ->add('NombreEnfant', TextType::class,[
            'attr' => ['class' => 'form-control']],)
        ->add('Email', TextType::class,[
            'attr' => ['class' => 'form-control']],)
        ->add('tele', TextType::class,[
            'label'=>'Téléphone',
            'attr' => ['class' => 'form-control']],)
        ->add('Adresse')
        // ->add('Photos', FileType::class, [
        //     'label' => "Photos d'employée",

        //     // unmapped means that this field is not associated to any entity property
        //     'mapped' => false,

        //     // make it optional so you don't have to re-upload the PDF file
        //     // every time you edit the Product details
        //     'required' => false,

        //     // unmapped fields can't define their validation using annotations
        //     // in the associated entity, so you can use the PHP constraint classes
        //     'constraints' => [
        //         new File([
        //             'maxSize' => '1024k',
        //             'mimeTypes' => [
        //                 'image/gif',
        //                 'image/jpeg',
        //                 'image/jpg',
        //             ],
        //             'mimeTypesMessage' => 'Please upload a valid image',
        //         ])
        //     ],
        // ])
        ->add('DateNaiss',DateType::class, [
            'required' => true,
            'label' => 'Date de naissance',
            'widget' => "single_text",
            'attr' => ['class' => 'form-control'],
           
        ])
        ->add('DateEntree',DateType::class, [
            'required' => true,
            'label' => 'Date Entrée',
            'widget' => "single_text",
            'attr' => ['class' => 'form-control'],
           
        ])
        ->add('dateSortie',DateType::class, [
            'required' => true,
            'label' => 'Date Sortie (Si Vous ete un retraité)',
            'widget' => "single_text",
            'attr' => ['class' => 'form-control'],
           
        ])
        ->add('StatueTravaille', ChoiceType::class, array(
            'multiple' => false,
            'expanded' => true,
          'label'=>"C'est un retraité" ,
            'choices' => array(
                'Oui' => '1',
                'Non' => '0'
            )))
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
