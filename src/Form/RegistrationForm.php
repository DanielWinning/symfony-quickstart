<?php

namespace App\Form;

use App\DTO\RegistrationDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationForm extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(
            'email',
            EmailType::class,
            [
                'label' => 'Email Address',
                'required' => true,
            ]
        );

        $builder->add(
            'password',
            PasswordType::class,
            [
                'label' => 'Password',
                'required' => true,
            ]
        );

        $builder->add(
            'confirmPassword',
            PasswordType::class,
            [
                'label' => 'Confirm Password',
                'required' => true,
            ]
        );
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RegistrationDTO::class,
        ]);
    }
}