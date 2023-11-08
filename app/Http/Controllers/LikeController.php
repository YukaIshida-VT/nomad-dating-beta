<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreLike;
use App\Models\Like;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(StoreLike $request)
    {
      Like::create([
        'liking_user_id' => $request->liking_user_id,
        'liked_user_id' => $request->liked_user_id,
      ]);

      return true;
    }

    public function getLinkings()
    {
      return Like::where('liking_user_id', auth()->user()->id)->pluck('liked_user_id');
    }
}