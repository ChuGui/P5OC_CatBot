<?php

namespace AppBundle\Form;

use AppBundle\Entity\Bird;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BirdFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('plumage', ChoiceType::class, array(
                'label' => "Plumage",
                'placeholder' => "Plumage",
                'attr' => array('class' =>'filter'),
                "choices" => array(
                    'Jaune' => 'jaune',
                    'Vert' => 'vert',
                    'Rouge' => 'rouge'
                ),

            ))
            ->add('pattes', ChoiceType::class,array(
                'label' => "Pattes",
                'placeholder' => "Pattes",
                'attr' => array('class' =>'filter'),
                'choices' => array (
                    'jaunes' => 'jaunes',
                    'noir'=> 'noir',
                    'marrons' => 'marrons',
                    'gris' => 'gris'
                )
            ))
            ->add('couleurBec', ChoiceType::class,array(
                'label' => "Couleur du bec",
                'placeholder' => "Couleur du bec",
                'attr' => array('class' =>'filter'),
                'choices' => array (
                    'jaune' => 'jaune',
                    'noir'=> 'noir',
                    'orange' => 'orange'
    )
            ))
            ->add('formeBec', ChoiceType::class,array(
                'label' => "Forme du bec",
                'placeholder' => "Forme du bec",
                'attr' => array('class' =>'filter'),
                'choices' => array (
                    'pointu' => 'pointu',
                    'court' => 'court',
                    'long' => 'long'
                )
            ))
        ;
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => "AppBundle\Entity\Bird"
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_birdFilter';
    }
}
