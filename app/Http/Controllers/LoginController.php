<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;


class LoginController extends Controller
{
  public function login()
  {
    $user = User::find(1);
    $tokens = $user->tokens->where('name', 'undefined');
    // 古いトークンをまず削除
    foreach ($tokens as $token) {
        $token->delete();
    }
    $token = $user->createToken('undefined')->plainTextToken;
      return $token;
  }

     public function logout()
     {
          /** @var User $user */
          $user = Auth::user();
         $tokens = $user->tokens->where('name', 'undefined');

         foreach ($tokens as $token) {
             $token->delete();
         }
 
         return true;
     }
}
