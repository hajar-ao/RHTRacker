<?php

namespace App\Form;

use App\Entity\Attestation;
use App\Entity\Employe;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Attestation1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('TypeAttestation', ChoiceType::class, [
                'label'=>'Type Attestation',
                'choices'  => [
                    'Attestation de travaille' => 'Attestation de travaille',
                    'Attestation de salaire' => 'Attestation de salaire',
                    
                ],
            ])
           
            
          
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Attestation::class,
        ]);
    }
}
