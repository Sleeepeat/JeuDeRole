<?php

namespace App\Form;

use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class AjoutProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomProduit', TextType::class,['attr' => ['class'=>'form-control'], 'label_attr' => ['class'=>'fw-bold']])
            ->add('descriptionProduit', TextType::class,['attr' => ['class'=>'form-control'], 'label_attr' => ['class'=>'fw-bold']])
            ->add('prixProduit', IntegerType::class,['attr' => ['class'=>'form-control'], 'label_attr' => ['class'=>'fw-bold']])
            ->add('quantitee', IntegerType::class,['attr' => ['class'=>'form-control'], 'label_attr' => ['class'=>'fw-bold']])
            ->add('envoyer', SubmitType::class, ['attr' => ['class'=> 'btn bg-primary text-white m-4' ],'row_attr' => ['class' => 'text-center'],]) 

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
