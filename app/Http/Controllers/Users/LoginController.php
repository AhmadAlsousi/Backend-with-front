<?php

namespace App\Http\Controllers\Users;

use App\Events\UserRegistered;
use App\Http\Controllers\APIController;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\LoginResesource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends APIController
{
     public function create(){
        // $data=$request->validated();
        // $category=Category::create($data['name']);
        // $category->addmedia($data['image'])->toMediaCollection(CategoryEnum::IMAGE->value);
        // return $category;
        


    }
   public function login(LoginRequest $request)
    {
        //        return "as";

        $data = $request->validated();

        $user = User::where('email', $data['email'])->first();
        if (! $user) {
            return $this->sendError('Email not found');
        }

        if (! Hash::check($data['password'], $user->password)) {
            return $this->sendError('The password is incorrect');
        }
        if ($user->email_verified_at == null) {
            return $this->sendResponce('You have not yet confirmed your account.', 200);
        }
        $user->token_user = $user->createToken('token')->plainTextToken;
        return $this->sendResponce(LoginResesource::make($user), 'Login successfully', 200);
    }
    function generateCsrfToken()
    {
        // توليد سلسلة عشوائية بطول 32 بايت
        $token = bin2hex(random_bytes(32));

        // تخزينها في الـ session
        $_SESSION['csrf_token'] = $token;

        // إرجاعها
        return $token;
    }
    public function logout($id){
            
    }
}
