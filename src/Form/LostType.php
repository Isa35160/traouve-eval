<?php


namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class LostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', TextType::class)
            ->add('picture')
            ->add('description', TextType::class)
            ->add('event_at')
            ->add('city', TextType::class)
            ->add('address', TextType::class)
            ->add('save',SubmitType::class);

    }

}