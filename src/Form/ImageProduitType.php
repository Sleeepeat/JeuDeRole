<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Produit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ImageProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('image', FileType::class, array('label' => 'Produit', 'mapped'=>false,'attr' => ['class'=> 'form-control'], 'label_attr' => ['class'=> 'fw-bold'],'constraints' => [
                new File([
                    'maxSize' => '200k',
                    'mimeTypes' => [
                    'application/pdf',
                    'application/x-pdf',
                    'image/jpeg',
                    'image/png',
                    ],
                    'mimeTypesMessage' => 'Le site accepte uniquement les fichiers PDF, PNG et JPG',
                ])
            ],))
            ->add('produit', EntityType::class, [
                'class' => Produit::class,
                'choice_label' => function($produit) {
                    return $produit->getNomProduit();
                },
                'attr' => ['class'=> 'form-control'], 'label_attr' => ['class'=>'fw-bold'],
            ])
            ->add('envoyer', SubmitType::class, ['attr' => ['class'=> 'btn bg-danger text-white m-4' ],'row_attr' => ['class' => 'text-center'],])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
