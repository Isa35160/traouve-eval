<?php

namespace App\Form;

use App\Entity\Traobject;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TraobjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('picture')
            ->add('description')
            ->add('eventAt')
            ->add('dateEnd')
            ->add('city')
            ->add('address')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('category')
            ->add('county')
            ->add('state')
            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Traobject::class,
        ]);
    }
}
