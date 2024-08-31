<?php
/**
 * Created by PhpStorm.
 * User: blessing
 * Date: 31/08/2024
 * Time: 1:50 pm
 */

namespace App\Services;

use App\Exceptions\ClientErrorException;
use App\Interfaces\UserServiceInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class UsersService implements UserServiceInterface
{
    public function login(array $credentials): array
    {
        $allow30Days = $credentials['allow_30_days'] ?? false;
        unset($credentials['allow_30_days']);
        $user = User::where('email', $credentials['email'])->first();
        if (!$user) throw new ClientErrorException('Account not found.');

        $auth = Auth::guard(self::$guard);
        if($allow30Days) {
            $auth = $auth->claims(['exp' => strtotime('+30 days')]);
        }
        $token = $auth->attempt($credentials);

        if(!$token) throw new ClientErrorException('Invalid credentials. Kindly try again.');
        $expiration = JWTAuth::setToken($token)->getPayload()->get('exp');
        $expirationTime = date('Y-m-d H:i:s', $expiration);

        return ['user' => $user, 'token' => $token, 'expires_at' => $expirationTime];
    }

    public function register(array $credentials): User
    {
        return User::create([
            'name' => $credentials['name'] ?? '',
            'email' => $credentials['email'],
            'business_name' => $credentials['business_name'],
            'password' => bcrypt($credentials['password']),
        ]);
    }

}
