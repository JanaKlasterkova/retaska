<?php

namespace App\Form;

use App\Entity\Platba;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlatbaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name', EntityType::class, [
                'class'=>Platba::class,
                'choice-label'=>'name',
            ])
            ->add('Price')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Platba::class,
        ]);
    }
}
