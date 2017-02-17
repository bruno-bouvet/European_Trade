<?php

namespace HarasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class contactType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name','text',array('mapped' => false, 'label' => false))
            ->add('Email','email',array('mapped' => false, 'label' => false))
            ->add('Phone','integer',array('mapped' => false,'label' => false))
            ->add('Message','textarea',array('mapped' => false,'label' => false))
            ->add('brochure', FileType::class, array('label' => 'Brochure (PDF file)'))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EurotradeBundle\Entity\document',
            'error_bubbling' => true
        ));
    }

    public function getName()
    {
        return 'contact_form';
    }
}