<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public static $_CLIENT = 'client';
    public static $_SHOPKEEPER = 'shopkeeper';

    public function isShopkeeper($user_id): bool
    {
        $user = User::find($user_id);
        return $user->profile === self::$_SHOPKEEPER;
    }

    public function verifyUserExists($user_id): bool
    {
        return (bool) User::find($user_id);
    }

    public function find($user_id): User
    {
        try {
            return User::find($user_id);
        } catch (\Exception $exception) {
            return $exception;
        }
    }
}