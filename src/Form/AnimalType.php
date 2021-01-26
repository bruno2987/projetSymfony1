<?php

namespace App\Form;

use App\Entity\Animal;
use App\Entity\Continent;
use App\Entity\Espece;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class AnimalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('color')
            ->add('famille')
            ->add('poids')
            ->add('espece',EntityType::class,[
                'class' => Espece::class,
                'choice_label' => 'libelle'
            ])
            ->add('continents',EntityType::class,[
                'class' => Continent::class,
                'choice_label' => 'libelle',
                'expanded' => true,
                'multiple' => true,      //Pour spécifier qu'il peu y en avoir plusieurs
                'by_reference' => false,     // Pour qu'il persiste (enregistrement dans la base)
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Animal::class,
        ]);
    }
}
