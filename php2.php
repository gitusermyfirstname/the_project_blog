<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class VotreController extends AbstractController
{
public function votreAction(Request $request)
{
$maClasse = new MaClasse();

$form = $this->createFormBuilder($maClasse)
->add('fichier', FileType::class, [
            'label' => 'Choisissez un fichier',
            'constraints' => [
                new Assert\File([
                    'maxSize' => '1024k',
                    'mimeTypes' => [
                        'application/pdf',
                        'application/x-pdf'
                    ],
                    'mimeTypesMessage' => 'Vérifiez que le format du fichier soit bien en PDF'
                ]),
                new Assert\Image([
                    // options pour la validation d'images
                    'minWidth' => 200,
                    'maxWidth' => 400,
                    'minHeight' => 200,
                    'maxHeight' => 400,
                ]),
            ],
        ])
        ->add('bic', TextType::class, [
            'label' => 'BIC',
            'constraints' => [
                new Assert\Bic(),
            ],
        ])
        
        // username
        ->add('username', TextType::class, [
            'label' => 'useryes',
            'constraints' => [
                new Assert\AtLeastOneOf([
                    //new Assert\Regex([
                        //'pattern' => '/#/',
                        //'message' => 'Le useryes doit contenir le caractère "#"'
                    //]),
                    new Assert\Length([
                        'min' => 3,
                        'minMessage' => 'Le champ doit contenir au moins {{ limit }} caractères'
                    ]),
                ]),
            ],
        ])


        // Password
        ->add('password', PasswordType::class, [
            'label' => 'password',
            'constraints' => [
                new Assert\AtLeastOneOf([
                    //new Assert\Regex([
                        //'pattern' => '/#/',
                        //'message' => 'Le password doit contenir le caractère "#"'
                    //]),
                    new Assert\Length([
                        'min' => 8,
                        'minMessage' => 'Le password doit contenir au moins {{ limit }} caractères'
                    ]),
                ]),
            ],
        ])
        ->add('champ', TextType::class, [
            'label' => 'Champ',
            'constraints' => [
                new Assert\AtLeastOneOf([
                    new Assert\Regex([
                        'pattern' => '/#/',
                        'message' => 'Le champ doit contenir le caractère "#"'
                    ]),
                    new Assert\Length([
                        'min' => 10,
                        'minMessage' => 'Le champ doit contenir au moins {{ limit }} caractères'
                    ]),
                ]),
            ],
        ])
        ->add('autreChamp', TextType::class, [
            'label' => 'Autre champ',
            'constraints' => [
                new Assert\Sequentially([
                    new Assert\NotNull(),
                    new Assert\Type(['type' => 'string']),
                    new Assert\Length([
                        'min' => 6,
                        'minMessage' => 'Le champ doit contenir au moins {{ limit }} caractères'
                    ]),
                ]),
            ],
        ])
        ->add('tableau', CollectionType::class, [
            'label' => 'Tableau',
            'entry_type' => TextType::class,
            'allow_add' => true,
            'allow_delete' => true,
            'constraints' => [
                new Assert\All([
                    new Assert\NotBlank(),
                    new Assert\Length([
                        'min' => 6,
                        'minMessage' => 'Le champ doit contenir au moins {{ limit }} caractères'
                    ]),
                ]),
            ],
        ])
        ->add('autreTableau', CollectionType::class, [
            'entry_type' => TextType::class,
            'allow_add' => true,
            'constraints' => [
                new Assert\Count([
                    'min' => 2,
                    'max' => 10,
                    'minMessage' => 'Le tableau doit contenir au moins {{ limit }} éléments',
                    'maxMessage' => 'Le tableau ne peut contenir plus de {{ limit }} éléments'
                ])
            ]
        ])

        // Email
        ->add('email', EmailType::class, [
            'constraints' => [
                new UniqueEntity([
                    'fields' => ['email'],
                    'message' => 'L\'email doit être unique'
                ])
            ]
        ])
        ->getForm();

    if ($request->isMethod('POST')) {
        $form->handleRequest($request);

        if ($form->isValid()) {
            // le formulaire est valide, faire quelque chose ici
        }
    }

    return $this->render('mon_template.html.twig', [
        'form' => $form->createView(),
    ]);
}













public function buildForm(FormBuilderInterface $builder, array $options): void
{
    $builder
        ->add('email', EmailType::class, [
                'constraints' => [
                new Email([
                    'message' => "cet adresse mail n'est pas valide"
                ])
            ]
        ])
        ->add('username', TextType::class, [
            'constraints' => [
                new Length([
                    'min' => 3,
                    'minMessage' => 'Vous devez rentrez au moins {{ limit }} caractères'

                ])
            ]
        ])
        ->add('password', PasswordType::class, [
            'constraints' => [
                new NotCompromisedPassword(),
                new Length([
                    'min' => 8,
                    'minMessage' => 'Vous devez rentrez au moins {{ limit }} caractères'
                ])
            ]
        ])
    ;
}




 /**
    * @Assert\NotNull
    * @Assert\Type(type="bool")
    */
    private $flag;

    /**
     * @Assert\NotEqualTo(value=0)
     * @Assert\LessThan(value=10000)
     */
    private $number;


    $builder
    ->add('flag', CheckboxType::class, [
        'constraints' => [
            new NotNull(),
            new Type([
                'type' => 'bool',
            ]),
        ],
    ])
    ->add('number', IntegerType::class, [
        'constraints' => [
            new NotEqualTo([
                'value' => 0,
            ]),
            new LessThan([
                'value' => 10000,
            ]),
        ],
    ]);