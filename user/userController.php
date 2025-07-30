<?php

/** @package  */
class userController
{
    private userService $userService;

    public function __construct(userService $userService)
    { //import database handler
        $this->userService = $userService;
    }

    public function registerUser()
    {
        $data = [
            'name' => [''],
            'email'   => [''],
            'password'   => [''],
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            require __DIR__ . '/../view/registeraccount.php';
            exit;
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                'realname'  => $_POST['realname'] ?? '',
                'email'     => $_POST['email'] ?? '',
                'password'  => $_POST['password'] ?? '',
            ];

            $this->userService->registerUser($data);
            header("Location: index.php?page=home");
        }
    }
}
