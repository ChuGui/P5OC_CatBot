<?php

namespace AppBundle\Form;

use AppBundle\Entity\Bird;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BirdFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('plumage', ChoiceType::class, array(
                'placeholder' => "Plumage",
                "choices" => array(
                    'Jaune' => 'jaune',
                    'Vert' => 'vert',
                    'Rouge' => 'rouge'
                )
            ))
            ->add('pattes', ChoiceType::class,array(
                'placeholder' => "Pattes",
                'choices' => array (
                    'jaunes' => 'jaunes',
                    'noires'=> 'noires',
                    'marrons' => 'marrons',
                    'bleues' => 'bleues'
                )
            ))
            ->add('couleurBec', ChoiceType::class,array(
                'placeholder' => "Couleur du bec",
                'choices' => array (
                    'jaune' => 'jaune',
                    'noir'=> 'noir',
                    'orange' => 'orange'
    )
            ))
            ->add('formeBec', ChoiceType::class,array(
                'placeholder' => "Forme du bec",
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
