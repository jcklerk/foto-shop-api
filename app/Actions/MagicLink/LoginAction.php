<?php

namespace App\Actions\MagicLink;

use App\Models\User;
use MagicLink\Actions\ActionAbstract;

class LoginAction extends ActionAbstract
{
    private User $user;
    public function __construct(private User $_user)
    {
        $this->user = $_user;
    }

    public function run()
    {
        // Do something

        $token = $this->user->createToken('api-token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'user' => $this->user->name,
            'token' => $token
        ]);
    }
}