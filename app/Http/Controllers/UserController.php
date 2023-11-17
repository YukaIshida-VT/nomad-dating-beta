<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      // return UserResource::collection(User::get());
      return User::with(['profile'])
      ->leftJoin('likes', function ($join) {
        $join->on('users.id', '=', 'likes.liked_user_id')
            ->where('likes.liking_user_id', '=', auth()->user()->id);
            // ToDo 論理削除対応(テーブルが対応次第)
        })
        ->select(['users.*', 'likes.id as liked'])
        ->get()->toArray();
    }

    public function hasProfile()
    {
      $user = auth()->user();

      return response([
        'has_profile' => $user->profile?->exists(),
    ]);
    }
}