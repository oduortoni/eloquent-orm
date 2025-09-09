<?php

namespace ERM\Domains\Users\Interfaces;

interface AuthControllerInterface
{
    public function showLogin();
    public function login(array $credentials);
    public function showRegister();
    public function register(array $data);
    public function logout();
}