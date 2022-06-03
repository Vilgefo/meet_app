<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\AuthRequest;
use App\Mail\Verification;
use App\Models\User as User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


    public function login(AuthRequest $request)
    {
        $data = $request->validated();
        $user = User::query()->where(['email' => $data ['email']])->first();
        $user->generateTwoFactorCode();
        \Mail::to($user)->send(new Verification($user->two_factor_code));
        return response('', 201);
    }
}
