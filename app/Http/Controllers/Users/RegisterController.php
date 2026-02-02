<?php

namespace App\Http\Controllers\Users;

use App\Events\UserRegistered;
use App\Http\Controllers\APIController;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Jobs\MailJob;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends APIController
{
    public function register(RegisterRequest $request)
    {
        $users = $request->validated();
        $cleanPhone = substr($users['phone'], 1);
        $phone = '+963' . $cleanPhone;
        $user = User::create([
            'name' => $users['name'],
            'email' => $users['email'],
            'password' => $users['password'],
            'phone' => $phone,
        ]);
        $code = rand(100000, 999999);
        $user->Confirmation_code = $code;
        $user->save();
        // event(new UserRegistered($user));
        dispatch(new MailJob($user));



        return $this->sendResponce('The account has been successfully created. You must confirm the account.', 201);
    }
}
