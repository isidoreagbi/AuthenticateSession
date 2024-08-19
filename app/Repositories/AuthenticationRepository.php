<?php

namespace App\Repositories;

use App\Interfaces\AuthenticationInterface;
use App\Mail\OtpCodeEmail;
use App\Models\User;
use App\Models\OtpCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthenticationRepository implements AuthenticationInterface
{
    public function login($data)
    {
        return Auth::attempt($data);
    }

    public function registration($data)
    {
        //  return User::create($data);


        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        $otpCode = [
            'email' => $data['email'],
            'code' => rand(121111, 989898),
        ];

        if ($user) {
            OtpCode::where('email', $data['email'])->delete();
            OtpCode::create($otpCode);
            session()->put('email', $data['email']);
            Mail::to($data['email'])->send(new OtpCodeEmail($user->name, $otpCode['code']));
        }
        return $user;
    }



    public function forgottenPassword($email)
    {
        $user = User::where('email', $email)->first();

        $otpCode = [
            'email' => $email,
            'code' => rand(121111, 989898),
        ];

        if ($user) {
            OtpCode::where('email', $email)->delete();
            OtpCode::create($otpCode);
            session()->put('email', $email);
            Mail::to($email)->send(new OtpCodeEmail($user->name, $otpCode['code']));
        }
        return $user;
    }

    public function checkOtpCode(array $data)
    {
        $code = OtpCode::where('email', $data['email'])->first();

        if ($code)
            if (!Hash::check($data['code'], $code->code))
                return false;

        session()->put('code', $data['code']);

        return $code;
    }

    public function newPassword(array $data)
    {
        $code = OtpCode::where('email', $data['email'])->first();

        if ($code)
            if (Hash::check($data['code'], $code->code)) {
                $user = User::where('email', $data['email'])->first();
                if (!$user)
                    return false;
                else {
                    $user->password = $data['password'];
                    $user->save();
                    Auth::login($user);
                    OtpCode::where('email', $data['email'])->delete();

                    return $user;
                }
            }

        return false;
    }
}
