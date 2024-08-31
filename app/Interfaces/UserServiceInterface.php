<?php
/**
 * Created by PhpStorm.
 * User: blessing
 * Date: 31/08/2024
 * Time: 1:52 pm
 */

namespace App\Interfaces;

use App\Models\User;

interface UserServiceInterface
{
    public function login(array $credentials): array;

    public function register(array $credentials): User;
}
