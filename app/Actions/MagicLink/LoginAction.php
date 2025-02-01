<?php

namespace App\Actions\MagicLink;

use App\Models\User;
use Laravel\Passport\Passport;
use MagicLink\Actions\ActionAbstract;

class LoginAction extends ActionAbstract
{
    private User $user;
    private bool $rememberMe;

    public function __construct(private User $_user, private bool $_rememberMe = false)
    {
        $this->user = $_user;
        $this->rememberMe = $_rememberMe;
    }

    public function run()
    {
        // Do something
        $expiresAt = now()->addMinutes(360); // 6 hours
        if ($this->rememberMe){
            $expiresAt = now()->addMinutes(10080); // 7 days
        }
        // Passport::tokensExpireIn($expiresAt);
       

        $token = $this->user->createToken('api-token')->accessToken;

        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'user' => $this->user->name,
            'token' => $token,
            'token_expires_at' => $expiresAt->format('Y-m-d H:i:s'),

        ]);
    }
}