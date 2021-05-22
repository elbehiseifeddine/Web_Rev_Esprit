<?php

namespace App\Form;

use App\Entity\RevClassrom;
use App\Entity\RevStudent;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RevStudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nsc')//nsc<input type=text>
            ->add('email')//email<input type=text>
            ->add('classroom',EntityType::class,[
                'class'=>RevClassrom::class,
                'choice_label'=>'name'
            ])
        ;
    }
    // configureOption permet de configure des options par rapport a les input
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RevStudent::class,
        ]);
    }
}
