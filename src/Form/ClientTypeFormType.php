<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientTypeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            // ->add('roles')
            // ->add('password')
            // ->add('nom')
            // ->add('prenom')
            // ->add('dateNaissance')
            // ->add('CreatedAt')
            // ->add('numeroCarte')
            // ->add('numeroTelephone')
            // ->add('lieuVisite')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
