<?php

namespace AppBundle\Form;

use AppBundle\Entity\Bird;
use AppBundle\Entity\Observation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;

class ObservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lieuObservation', TextType::class, array(
                'mapped' => false,
                'label' => "Lieu de l'observation"
            ))
            ->add('observedAt', DateType::class, array(
                'label' => "Date de l'observation",
                'widget' => "single_text",
                'format' => "dd-MM-yyyy",
                'attr' => array(
                    'class' => 'js_datepicker',
                    'html5' => false
                    )
                ))
            ->add('qtyBirds', IntegerType::class, array(
                'label' => "Nombre d'oiseaux"
            ))
            ->add('description', TextareaType::class, array(
                'label' => "Description libre"
            ))
            ->add('bird', EntityType::class, array(
                'label' => "Nom de l'espèce",
                'class' => 'AppBundle\Entity\Bird',
                'placeholder' => "Nom de l'espèce",
                'choice_label' => 'name',
                'expanded' => false,
                'multiple' => false
            ))
            ->add('imageFile', VichFileType::class, array(
                'attr' => array(
                    'class' => 'upload-image'),
                'required' => false,
                'allow_delete' => true,
                'label' => 'Ajouter une image',
                'label_attr' => array(
                    'class' => 'label-image'
                )
            ))
            ->add('latitude', HiddenType::class)
            ->add('longitude', HiddenType::class)
        ;
    }


    public function configureOptions(OptionsResolver $resolver)
    {

    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_observation';
    }
}
