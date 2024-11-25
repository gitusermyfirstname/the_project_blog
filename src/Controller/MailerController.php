<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class MailerController extends AbstractController
{
    public function sendEmailAction(Request $request, MailerInterface $mailer): Response
    {

        // // sending with class Email

        // $email = (new Email())
        //     ->from('pseudo1@example.com')
        //     ->to('pseudo2@example.com')
        //     ->subject('MailTrap')
        //     ->text('s\'exercer avec mailTrap');

        // $mailer->send($email);


        // return $this->redirectToRoute('app_logout');


        // sending with class TemplatedEmail

            $email = (new TemplatedEmail())
            ->from('pseudo1@example.com')
            ->to('pseudo2@example.com')
            ->subject('MailTrap')
            ->htmlTemplate('emails/test.html.twig')
            ->context([
                'username' => 'test'
            ]);

        $mailer->send($email);


        return $this->redirectToRoute('app_on_logged');
    }
}