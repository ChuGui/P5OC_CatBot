<?php

namespace AppBundle\Form;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('searchUser', SearchType::class, array(
                'label' => 'Rechercher utilisateur',
                'attr' => [
                    'placeholder' => 'Rechercher utilisateur'
                    ]
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_search_user';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
    }
}
