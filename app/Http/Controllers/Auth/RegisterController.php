<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\RegistrationRequest;
use App\Mail\Verification;
use App\Models\User;


class RegisterController extends Controller
{

    public function register(RegistrationRequest $request)
    {
        $data = $request->validated();
        $user = User::query()->create($data);

        $user->generateTwoFactorCode();
        \Mail::to($user)->send(new Verification($user->two_factor_code));
        return response('', 201);
    }
}
