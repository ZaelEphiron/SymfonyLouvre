<?php

namespace App\Form;

use App\Entity\Ticket;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

class TicketingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('appointement', DateType::class, array(
            'label'    => 'Date de la visite',
            'required' => true,
            ))
            ->add('firstName', TextType::class, array(
            'label'    => 'Prénom :',
            'required' => true,
            ))
            ->add('name', TextType::class, array(
            'label'    => 'Nom :',
            'required' => true,
            ))
            ->add('birthdate', BirthdayType::class, array(
            'label'    => 'Date de naissance :',
            'required' => true,
            ))
            ->add('country', CountryType::class, array(
            'label'    => 'Pays :',
            'required' => true,
            ))
            ->add('type', CheckboxType::class, array(
            'label'    => 'Demi-journée',
            'required' => false,
            ))
            ->add('reducedRate', CheckboxType::class, array(
            'label'    => 'Tarif réduit',
            'required' => false,
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ticket::class,
        ]);
    }
}
