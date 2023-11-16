<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreLike;
use App\Http\Requests\StoreProfile;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(StoreProfile $request)
    {
      //　ToDo カラムに合わせてstoreメソッドを作る。あとupadteメソッドも作る。
      Profile::updateOrCreate(
        ['user_id' => auth()->user()->id],
        [
        'user_id' => auth()->user()->id,
        'country' => $request->country,
        'is_nomad' => $request->is_nomad,
        'occupation' => $request->occupation,
        'looking_for' => $request->looking_for,
        'gender' => $request->gender,
        'comment' => $request->comment,
      ]);

      return true;
    }

    public function getByUserId()
    {
      $profile = Profile::firstWhere('user_id', auth()->user()->id);

      return $profile;
    }
}