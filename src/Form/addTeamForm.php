<?php
/**
 * Created by PhpStorm.
 * User: tcornado
 * Date: 09/08/2018
 * Time: 11:56
 */

namespace App\Form;



use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class addTeamForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('name', TextType::class, ['label'=>'Nom équipe'])
            ->add('surnom', TextType::class, ['label'=>'Surnom équipe'])
            ->add('location', TextType::class, ['label'=>'Localité équipe'])
            ->add('dateCreation',      DateTimeType::class, ['label'=>'Date de Création'])
            ->add('positionanneePrec', IntegerType::class, ['label'=>'Position league année antérieur'])
            ->add('submit', SubmitType::class, ['label'=>'Envoyer', 'attr'=>['class'=>'btn-primary btn-block']])
        ;
    }
}