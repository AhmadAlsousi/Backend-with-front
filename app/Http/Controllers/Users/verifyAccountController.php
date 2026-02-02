<?php

namespace App\Http\Controllers\Users;

use App\Enum\Video\VideoEnum;
use App\Http\Controllers\APIController;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\User\Auth\VeifybywhatsRequset;
use App\Http\Requests\VerifyRequest;
use App\Http\Requests\VideoRequest;
use App\Http\Resources\LoginResesource;
use App\Models\User;
use App\Services\WhatsAppService;
use Illuminate\Support\Facades\Request;
use phpDocumentor\Reflection\Types\String_;
use phpDocumentor\Reflection\Types\This;

use function Symfony\Component\Clock\now;

class verifyAccountController extends APIController
{

  // protected $search;
  //     public function __construct(SearchSubcategoryService $search)
  //     {
  //         $this->search = $search;
  //     }
  public function verify(VerifyRequest $request)
  {
    $code = $request->validated();
    $user = User::where('email', $code['email'])->first();
    if ($user->email_verified_at) {
      return $this->sendError('Account already verified', 400);
    }
    if ($code['code'] == $user->Confirmation_code) {
      $user->email_verified_at = now();
      $user->save();
      $user->token_user = $user->createToken('token')->plainTextToken;
      return $this->sendResponce(LoginResesource::make($user), 'Your account has been successfully verified.', 200);
    } else {
      return $this->sendError('غير صحيح الكود ', 400);
    }
  }
  public function whatsup(VeifybywhatsRequset $request, WhatsAppService $whatsApp)
  {
    $phoneuser = $request->validated();
    $cleanPhone = substr($phoneuser['phone'], 1);
    $phone = '963'. $cleanPhone;
    $user=User::where('phone',$phone)->first();
    // return $this->sendResponce($user,'a',201);
    $code = rand(100000, 999999);
    $user->Confirmation_code = $code;
    $user->save();
    $body="Welcome,".$user->name." Your account confirmation number.".$code;
    // return $phone;
     $response = $whatsApp->sendMessage($phone, $body);

    return $this->sendResponce($response, 'Message sent', 200);

    
  }
}
