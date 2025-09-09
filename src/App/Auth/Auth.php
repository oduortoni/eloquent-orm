<?php

namespace ERM\App\Auth;

use ERM\App\Session\Session;

class Auth
{
    public static function login(int $userId): void
    {
        Session::set('user_id', $userId);
    }

    public static function logout(): void
    {
        Session::remove('user_id');
    }

    public static function check(): bool
    {
        return Session::has('user_id');
    }

    public static function id(): ?int
    {
        return Session::get('user_id');
    }

    public static function user(): ?array
    {
        // TODO: Fetch user data from database using the user_id
        if (self::check()) {
            return ['id' => self::id(), 'name' => 'User ' . self::id()];
        }
        return null;
    }
}