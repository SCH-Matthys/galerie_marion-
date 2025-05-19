<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Email(['message' => 'Veuillez entrer un email valide.']),
                ],
            ])
            ->add('password', PasswordType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length(['min' => 8, 'minMessage' => 'Le mot de passe doit contenir au moins 8 caractères.']),
                    new Assert\Regex([
                        'pattern' => '/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/',
                        // (?=.*[A-Z]) → Au moins une majuscule
                        // (?=.*\d) → Au moins un chiffre
                        // (?=.*[\W_]) → Au moins un caractère spécial
                        // . {8,} → Minimum 8 caractères
                        'message' => 'Le mot de passe doit contenir au moins une majuscule, un chiffre et un caractère spécial.',
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
