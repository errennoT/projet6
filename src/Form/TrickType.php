<?php

namespace App\Form;

use App\Entity\Trick;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrickType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => "Nom du trick"])
            ->add('description', TextareaType::class, [
                'label' => "Description",
                'attr' => ['rows' => 5]])
            ->add('category', ChoiceType::class, [
                'label' => "Catégorie",
                'choices' => [
                    'Grabs' => "Grabs",
                    'Rotations' => "Rotations",
                    'Flips' => "Flips",
                    'Rotations désaxées' => "Rotations désaxées",
                    'Slides' => "Slides",
                    'Old school' => "Old school",
                ]
            ])
            ->add('defaultPicture', FileType::class, [
                'label' => 'Ajouter une image en avant:',
                'required' => true,
                'multiple' => false,
            ])
            ->add('pictureTricks', CollectionType::class, [
                'entry_type' => TrickPictureType::class,
                'entry_options' => [
                    'label' => false
                ],
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true
            ])
            ->add('videoTricks', CollectionType::class, [
                'entry_type' => VideoType::class,
                'entry_options' => [
                    'label' => false
                ],
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Trick::class,
        ]);
    }
}
