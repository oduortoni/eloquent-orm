<?php

namespace ERM\Domains\Users\Controllers;

use ERM\App\View\View;
use ERM\Domains\Users\Interfaces\AuthControllerInterface;
use ERM\Domains\Users\Interfaces\UserServiceInterface;

class AuthController implements AuthControllerInterface
{
    protected View $view;
    protected UserServiceInterface $userService;

    public function __construct(View $view, UserServiceInterface $userService)
    {
        $this->view = $view;
        $this->userService = $userService;
    }

    public function showLogin()
    {
        return $this->view->render('auth.login', ['title' => 'Login']);
    }

    public function login(array $credentials)
    {
        try {
            if ($this->userService->login($credentials['email'], $credentials['password'])) {
                header('Location: /');
                exit;
            } else {
                return $this->view->render('auth.login', [
                    'title' => 'Login',
                    'error' => 'Invalid credentials'
                ]);
            }
        } catch (\Exception $e) {
            return $this->view->render('auth.login', [
                'title' => 'Login',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function showRegister()
    {
        return $this->view->render('auth.register', ['title' => 'Register']);
    }

    public function register(array $data)
    {
        try {
            $this->userService->register($data);
            header('Location: /login');
            exit;
        } catch (\Exception $e) {
            return $this->view->render('auth.register', [
                'title' => 'Register',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function logout()
    {
        $this->userService->logout();
        header('Location: /login');
        exit;
    }
}