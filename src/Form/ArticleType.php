<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Article;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                "label" => "Titre",
                "attr" => [
                    "placeholder" => "Nom de l'oeuvre.",
                ]
            ])
            ->add('description', TextareaType::class, [
                "label" => "Description",
                "attr" => [
                    "placeholder" => "Description de l'oeuvre.",
                ]
            ])
            ->add('artist_name', TextType::class, [
                "label" => "Nom",
                "attr" => [
                    "placeholder" => "Nom de l'artiste.",
                ]
            ])
            ->add('article_details', TextType::class, [
                "label" => "Nom de l'oeuvre et date",
                "attr" => [
                    "placeholder" => "Nom de l'oeuvre et date.",
                ]
            ])
            ->add('technic', TextType::class, [
                "label" => "Technique(s) utilisée(s).",
                "attr" => [
                    "placeholder" => "Technique(s) utilisée(s)",
                ]
            ])
            ->add('dimension', TextType::class, [
                "label" => "Dimensions",
                "attr" => [
                    "placeholder" => "Dimensions.",
                ]
            ])
            ->add('images', CollectionType::class, [
                'entry_type' => ImageType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'prototype' => true,  // Assure que le prototype est bien activé
                'prototype_name' => '__image__', // Définit un nom unique pour éviter les conflits
                'label' => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
