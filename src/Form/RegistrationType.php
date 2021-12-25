<?php

namespace App\Form;

use App\Entity\User;
use App\Form\ApplicationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class RegistrationType extends ApplicationType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, $this->getConfiguration("Prénom", "Votre Prénom..."))
            ->add('lastName', TextType::class, $this->getConfiguration("Nom", "Votre Nom de famille..."))
            ->add('email', EmailType::class, $this->getConfiguration("Email", "Votre adresse email..."))
            ->add( 'picture', UrlType::class, $this->getConfiguration("Photo de profil", "URL de votre avatar..."))
            ->add( 'hash', PasswordType::class, $this->getConfiguration("Mot de passe", "Choisissez un mot de passe.!"))
            ->add( 'introduction', TextType::class, $this->getConfiguration("Introduction", "Presentez vous en quelques mots.."))
            ->add( 'description', TextareaType::class, $this->getConfiguration("Description détaillée", "C'est le moment de vous présenter en détails !"));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
