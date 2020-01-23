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
                'choice_label' => 'name',
                'label'=>'Země'
            ])
            ->add('Doprava',EntityType::class, [
                'class'=>Doprava::class,
                'choice_label' => 'name',
                'label'=>'Doprava',
        'choice_attr' => function($doprava) {
            /** @var Doprava $doprava */
        return ['data-price' => $doprava->getPrice()];
    }
            ])

            ->add('Platba',EntityType::class, [
                'class'=>Platba::class,
                'choice_label' => 'name',
                'label'=>'Platba',
                'choice_attr' => function($platba) {
                /** @var Platba $platba */
                    return ['data-price' => $platba->getPrice()];
                }
            ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ordr::class,Country::class,
        ]);
    }
}


