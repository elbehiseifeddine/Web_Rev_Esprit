<?php

namespace App\Form;

use App\Entity\RevClassrom;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RevClassromType extends AbstractType
{
    //FormBuilder est le constructeur de la formulaire
    // array contient des option specific au type de champ
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //TextType [symfony\component\form\Extention
            ->add('Name', TextType::class,[
                'label'=>'Nom Classroom',
                'attr'=>[
                    'placeholder'=>'merci',
                    'class'=>'name'
                ]
            ])//Name<input type=text>
        ;
    }
    // configureOption permet de configure des options par rapport a les input
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RevClassrom::class,
        ]);
    }
}
