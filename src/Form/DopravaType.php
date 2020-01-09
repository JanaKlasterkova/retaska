<?php

namespace App\Form;

use App\Entity\Doprava;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DopravaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name', EntityType::class, [
        'class'=>Doprava::class,
        'choice-label'=>'name'
    ])
            ->add('Price')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Doprava::class,
        ]);
    }
}
