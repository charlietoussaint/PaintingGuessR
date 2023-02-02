<?php

namespace App\Form;

use App\Entity\ArtMovment;
use App\Entity\Painting;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaintingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('painting_name')
            ->add('paintingURL')
            ->add('paintingDate')
            ->add('painterName')
            ->add('painterDescription')
            ->add('smallPaintingUrl')
            ->add('movmentKey', null, [
                'choice_label' => 'art_movment_name',
                'label' => 'Mouvement Artistique'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Painting::class,
        ]);
    }
}

            // ->add('partner', EntityType::class, [
            //     'required' => false,
            //     'mapped' => false,
            //     'class' => Partner::class,
            //     'choice_label' => 'name',
            //     'choice_value' => 'id',
            //     'label' => 'Entreprise',
            //     'multiple' => false,
            //     'expanded' => false,
            //     'placeholder' => 'Ex : Externatic',
            // ]);