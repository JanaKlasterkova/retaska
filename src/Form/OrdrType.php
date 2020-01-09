<?php

namespace App\Form;

use App\Entity\Country;
use App\Entity\Doprava;
use App\Entity\Ordr;
use App\Entity\Platba;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrdrType extends AbstractType

{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name')
            ->add('Email')
            ->add('Phone')
            ->add('Street')
            ->add('City')
            ->add('PSC')
            ->add('Country',EntityType::class, [
                'class'=>Country::class,
                'choice_label' => 'name'
            ])
            ->add('Doprava',EntityType::class, [
                'class'=>Doprava::class,
                'choice_label' => 'name'
            ])

            ->add('Platba',EntityType::class, [
                'class'=>Platba::class,
                'choice_label' => 'name'
            ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ordr::class,Country::class,
        ]);
    }
}


