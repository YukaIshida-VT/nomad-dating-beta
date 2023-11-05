<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;


class TwitterLoginController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            // ログイン済みのユーザーはtop画面にリダイレクト
            return redirect('/top');
        } else {
            return view('twitterLogin')->with('title', 'ログイン | Tsumiage App');
        }
    }

    /**
       * Twitterの認証ページヘユーザーをリダイレクト
       *
       * @return \Illuminate\Http\Response
       */      
      public function redirectToProvider(){
        return Socialite::driver('twitter')->redirect();
     }   
    /**
     * Twitterからユーザー情報を取得(Callback先)
     *
     * @return \Illuminate\Http\Response
    */    
    public function handleProviderCallback()
    {
        try {
            $twitterUser = Socialite::driver('twitter')->user();
        } catch (Exception $e) {
            return redirect('auth/twitter');
        }
        $user = User::where('twitter_id', $twitterUser->getId())->first();
         if($user){
            if ($twitterUser->getAvatar() != $user->avatar) {
                // ツイッターでアバターが更新されていた場合はデータベースの情報も更新する
                User::where('email', $twitterUser->getId())->update(['avatar' => $twitterUser->getAvatar()]);
            }
         }else{
            $user = new User();
            $user->name = $twitterUser->getName();
            $user->twitter_id = $twitterUser->getId();
            $user->password = md5(Str::uuid());
            $user->avatar = $twitterUser->getAvatar();
            $user->nickname = $twitterUser->getNickname();
            $user->save();
         }
         Log::info('Twitterから取得しました。', ['user' => $twitterUser]);
         // ToDo personal access tokenの有効期限はcookieと合わせるべき？
         $PAToken = $user->createToken('undefined')->plainTextToken;
        //  Auth::login($user);
         return redirect('/top');
     }

     public function logout()
     {
        // ToDo Auth::logoutの処理は不要？
        //  Auth::logout();
         return redirect('/');
     }
}
