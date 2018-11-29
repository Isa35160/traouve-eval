<?php

namespace App\Form;

use App\Entity\Traobject;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TraobjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array('label' => 'Titre'))
            ->add('picture', TextType::class, array('label' => 'Image'))
            ->add('description', TextType::class, array('label' => 'Description'))
            ->add('eventAt', DateTimeType::class, array(
                'label' => 'Date evenement'))
            ->add('dateEnd', DateTimeType::class, array('label' => 'Date fin'))
            ->add('city', TextType::class, array('label' => 'Ville'))
            ->add('address', TextType::class, array('label' => 'Adresse'))
            ->add('createdAt')
            ->add('updatedAt')
            ->add('category')
            ->add('county')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Traobject::class,
        ]);
    }
}
