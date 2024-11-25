<?php

namespace App\EventListener;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class AjaxListener
{
   public function onKernelRequest(RequestEvent $event)
   {
       $request = $event->getRequest();

       if ($request->isXmlHttpRequest()) {
           // La requête est une requête Ajax
           // Ajouter un en-tête pour indiquer que la réponse est une réponse JSON
           $response = new JsonResponse();
           $response->headers->set('Content-Type', 'application/json');

           // Définir un en-tête de sécurité pour empêcher les attaques CSRF
           $response->headers->set('X-CSRF-Token', $request->attributes->get('_csrf_token'));

           // Définir la réponse de l'événement
           $event->setResponse($response);
       }
   }
}