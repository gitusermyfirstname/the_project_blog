<?php

namespace App\Form;

use App\Entity\User;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control mt-3 mb-3',
                ],
                'label' => 'Email',
                'required' => true
            ])
            // ->add('yes', TextType::class, [
            //     'attr' => [
            //         'class' => 'form-control mt-3 mb-3',
            //     ],
            //     'label' => 'yes',
            //     'required' => true
            // ])
            ->add('Password', PasswordType::class, [
                'attr' => [
                    'class' => 'form-control mt-3 mb-3',
                ],
                'label' => 'Mot de passe',
                'required' => true
            ])
            // ->add('confirmPassword', PasswordType::class, [
            //     'attr' => [
            //         'class' => 'form-control mt-3 mb-3',
            //     ],
            //     'label' => 'Confirmation du mot de passe',
            //     'required' => true
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
