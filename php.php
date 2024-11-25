<?php

#[Route('/comment')]
class CommentController extends AbstractController
{
#[Route('/new', name: 'app_comment_new', methods: ['GET', 'POST'])]
public function new(Request  $request) : Response
{
    $comment = new Comment();
    $form = $this->createFormBuilder($comment)
        ->add('title', TextType::class, [
            'attr' => [
                'class' => 'form-control mt-3 mb-3',
            ],
            'label' => 'titre du commentaire',
            'required' => true
        ]
)
        ->add('content', TextareaType::class, [
            'attr' => [
                'class' => 'form-control mt-3 mb-3',
            ],
            'label' => 'Commentaire',
            'required' => true
        ])
    ->getForm();




#[Route('/new', name: 'app_comment_new', methods: ['GET', 'POST'])]

public function new(Request  $request) : Response

{



$form = $this->createForm(CommentType::class);

return $this->render('comment.html.Twig', [

    'form' => $form,

]);  

}
}
}







use Symfony\Component\Validator\Constraints as Assert;


use Symfony\Component\Validator\Constraints as Assert;

class ExampleEntity
{
#[Assert\NotBlank]
#[Assert\Length(min: 2, max: 50, minMessage: 'Vous devez avoir plus de {{ limit }} caractères')]
#[Assert\EqualTo('John')]
private string $name;


#[Assert\NotNull]
#[Assert\Type('integer')]
#[Assert\Positive]
#[Assert\Regex("/^\d{2}$/")]
private int $age;

#[Assert\Null]
#[Assert\Negative]
private ?int $negativeNumber;

#[Assert\Email]
private string $email;

#[Assert\IsTrue]
private bool $trueValue;

#[Assert\IsFalse]
private bool $falseValue;

#[Assert\URL]
private string $url;

#[Assert\DateTime]
private \DateTimeInterface $dateTime;

#[Assert\Time]
private \DateTimeInterface $time;

#[Assert\Date]
private \DateTimeInterface $date;

#[Assert\TimeZone]
private string $timeZone;

#[Assert\IdenticalTo(3)]
#[Assert\NotIdenticalTo(3)]
#[Assert\LessThan(3)]
#[Assert\GreaterThan(3)]
#[Assert\Range(min: 100, max: 200)]
private int $number;

#[Assert\Unique]
#[Assert\Choice(['Actus', 'Divers', 'Retro'])]
private string $category;

#[Assert\Blank]
#[Assert\NegativOrZero]
#[Assert\PositiveOrZero]
private ?int $nullableNumber;

#[SecurityAssert\UserPassword]
private string $password;
}










class Task
{
    const CATEGORY = ['Actus', 'Divers', 'Retro'];

    #[Assert\Choice(choices: CATEGORY)]
    protected $category;
}














namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class TaskType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options)
    {
    $builder
        ->add('title', TextType::class, [
            'required' => true,
            'constraints' => [
                new NotBlank([
                    'message' => 'Un titre doit être saisi',
                ]),
                new Length([
                    'min' => 5,
                    'minMessage' => 'Le titre doit contenir au moins {{ limit }} caractères',
                    'max' => 255,
                ]),
            ],
            ])
        ->add('content', TextareaType::class)
    }
}






#[Assert\File(
maxSize: '1024k',
mimeTypes: ['application/pdf', 'application/x-pdf],
mimeTypesMessage: 'vérifiez que le format du fichier soit bien en PDF'
)]

#[Assert\Bic] contraintes proposées par Symfony : Bic, CardScheme, Currency, Luhn, Iban, Isbn, Issn, Isin.




#[Assert\AtLeastOneOf([
    new Assert\Regex('/#/'),
    new Assert\Length(min: 10),
])]


#[Assert\All([
new Assert\NotBlank,
new Assert\Length(min:6),
])]
protected $tableau = [];


#[Assert\Count( min:2, max:10)]