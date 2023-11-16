<?php

namespace App\Form;

use App\Entity\Events;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; 
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints\Regex;

class EventsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('titreevent', null, [
            'label' => 'Titre event',
            'attr' => ['class' => 'form-control'],
            'constraints' => [
                new NotBlank(),
                new Length(['max' => 255]),
            ],
        ])

        ->add('nomcoach', null, [
            'label' => 'Votre Coach',
            'attr' => ['class' => 'form-control'],
            'constraints' => [
                new NotBlank(),
                new Length(['max' => 255]),
            ],
        ])
        
        ->add('typeevent', null, [
            'label' => 'type',
            'attr' => ['class' => 'form-control'],
            'constraints' => [
                new NotBlank(),
                new Length(['max' => 255]),
            ],
        ])
        ->add('adresseevent', null, [
            'label' => 'adresse',
            'attr' => ['class' => 'form-control'],
            'constraints' => [
                new NotBlank(),
                new Length(['max' => 255]),
            ],
        ])
        
        ->add('prixevent', null, [
            'label' => 'Prix',
            'attr' => ['class' => 'form-control'],
            'constraints' => [
                new NotBlank(),
                new GreaterThan(0),
            ],
        ])

    


        ->add('dateevent', DateType::class, [
            'widget' => 'choice',
        ])

->add('imgevent', null, [
    'label' => 'Votre Coach',
    'attr' => ['class' => 'form-control'],
    'constraints' => [
        new NotBlank(),
        new Length(['max' => 255]),
    ],
])
            
            ->add('nombreplacesreservees')
            ->add('nombreplacestotal')
            ->add('idUser', EntityType::class, [ 
                'class' => 'App\Entity\User',
                'choice_label' => 'id',
            ])
            ->add('idtype', EntityType::class, [ 
                'class' => 'App\Entity\TypeEvent',
                'choice_label' => 'Id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Events::class,
        ]);
    }
}