<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\AuthCodeRequest;
use App\Http\Resources\UserInfoResource;
use App\Models\User;
use App\Models\UserInfo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{

    public function authAttempt(AuthCodeRequest $request)
    {
        $data = $request->validated();
        $user = User::query()->where(['email'=>$data['email']])->first();
        $current_time = strtotime(date('Y-m-d H:i:s', time()));
        $code_exp_time = strtotime($user->two_factor_expires_at);

        if($user->two_factor_code === $data['code'] &&  $code_exp_time > $current_time)
        {
            $action = 'login';
            if($user->email_verified_at === null)
            {
                $user->email_verified_at = Carbon::now()->toDateTimeString();
                $user->save();
                $user->userInfo()->save(new UserInfo());
                $action = 'register';
            }

            $token = $user->createToken('main', ['user'])->plainTextToken;
            Auth::login($user);
            $user->resetTwoFactorCode();

            return response([
                'user' => new UserInfoResource($user->userInfo),
                'email' => $user->email,
                'token' => $token,
                'action' => $action
            ]);
        }

        return response(['message'=> 'Wrong code'], 422);
    }
}
