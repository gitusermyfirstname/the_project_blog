<?php

namespace App\DataCollector;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;

class UserListCollector extends DataCollector
{

    public function __construct(
        private UserRepository $userRepository,
    ) {}

    public function collect(Request $request, Response $response, \Throwable $exception = null)
    {
        $this->data = [
            'method' => $request->getMethod(),
            'acceptable_content_types' => $request->getAcceptableContentTypes(),
            'users' => $this->userRepository->findAll(),
            'countUsers' => count($this->userRepository->findAll())
        ];
    }

    public function reset()
    {
        $this->data = [];
    }
    public function getName()
    {
        return 'toolbar';
    }
    public function getMethod()
    {
        return $this->data['method'];
    }

    public function getAcceptableContentTypes()
    {
        return $this->data['acceptable_content_types'];
    }
    public function getCountUsers()
    {
        return $this->data['countUsers'];
    }
    public function getUsers()
    {
        return $this->data['users'];
    }
}