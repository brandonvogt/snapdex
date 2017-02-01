<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
//use Symfony\Component\Form\Extension\Core\Type\HiddenType;
//use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class PictureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder
            ->add('caption', TextType::class)
//            ->add('user_id', EntityType::class, array(
//                'label' => 'User',
//                'class' => 'AppBundle:User',
//                'choice_label' => 'username',
//                'choice_value' => 'id',
//                'placeholder' => 'Please choose',
//                'empty_data'  => null
//            ))
            ->add('guid', FileType::class, array(
                'label' => 'Picture'
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Picture',

        ));
    }
}