<?php

namespace App\Http\Controllers\account;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Actions\MagicLink\LoginAction;
use MagicLink\MagicLink;
use Illuminate\Support\Facades\RateLimiter;

class LoginController extends Controller
{
    public function sendLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'callback' => 'nullable|url'
        ]);

        // rate limit
        $rateLimitString = 'loginUrlAtempt:'.$request->email."+".$request->ip;
        if (RateLimiter::tooManyAttempts($rateLimitString, $maxAttempts = 1)) {
            $seconds = RateLimiter::availableIn($rateLimitString);
            return response()->json([
                'success' => false,
                'message' => 'Too many attempts.',
                'seconds' => $seconds,
            ], 429);
        }
        RateLimiter::increment($rateLimitString, $decaySeconds = 90);

        // login action
        $user = User::where('email', $request->email)->firstOrFail();
        if (!$user) {
            return response()->json(['message' => 'Invalid email'], 400);
        }
        $action = new LoginAction($user);

        $lifetime = 240; // expired in the time
        $numMaxVisits = 1; // Only can visit one time

        $magicLink = MagicLink::create($action, $lifetime, $numMaxVisits);

        $url = $magicLink->url;

        if ($request->callback) {
            $url = $request->callback . '?callback=' . $magicLink->id . urlencode(':') . $magicLink->token;
        }        

        // dd([$magicLink->url,$magicLink->id . urlencode(':') . $magicLink->token]);

        return response()->json([
            'success' => true,
            'message' => 'Login link sent',
            'url' => $url,
        ]);
    }
}
