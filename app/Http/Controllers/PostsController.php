<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//postを引っ張ってくる
use App\Post;
use Auth;
use App\User;
use App\Follow;

class PostsController extends Controller
{
    //top表示
    public function index(){
        $list=\DB::table('posts')
        ->join('users' , 'posts.user_id' , '=' , 'users.id')
        ->leftjoin('follows', 'posts.user_id', '=', 'follows.follow')
        ->select('users.username','posts.posts','posts.created_at','users.images' , 'posts.id' ,'posts.user_id')
        // 書く順番＝テーブル：カラム順に記述
        ->where('follows.follower', Auth::id() )
        ->orwhere('posts.user_id', Auth::id() )
        ->get();
        //dd($list) ;

        return view('posts.index',compact('list'));
    }

    //tweetつぶやき
    public function tweet(Request $request){
        Post::create([
            'user_id'=> Auth::id(), 
            'posts'=> $request -> input('tweet'),
        ]);
        return redirect('/top');
    }

    // 削除機能
    public function delete ($id)
    {
        \DB::table('posts')
        ->where('id',$id)
        ->delete();

        return redirect('/top');
    }

    //ユーザー検索表示,フォローはずし

    public function search(Request $request) {

        $users=User::get();

        $follow=\DB::table('follows')
        ->where('follower' , Auth::id())
        ->get()
        ->toArray();

        return view ('users.search',compact('users','follow'));
    }

    // あいまい検索
    public function searchResult(Request $request) {
        // dd($request);
        $word = $request->input('search');
        $result = User::where('username', 'like',"%$word%")//あいまい検索
        ->get();
        // dd($result);
        $follow=\DB::table('follows')
        ->where('follower' , Auth::id())
        ->get()
        ->toArray();
        return view ('users.search', ['users'=>$result,'follow'=>$follow, 'word'=>$word]);
    }


    // フォロー機能

    public function follow(Int $id) {
        Follow::create([
            'follow' => $id,
            'follower' => Auth::id(),
        ]);

        return redirect('/search');
    }


    // フォローを外す 

    public function remove($id) {
        \DB::table('follows')
        ->where('follower', Auth::id() )
        ->where('follow', $id)
        ->delete();

        return redirect('/search');
    }


    //フォローリスト(フォロー表示),(投稿表示)
    public function followList(){
        $list=\DB::table('follows')
        ->join('users' , 'follows.follow' , 'users.id')
        ->where ('follows.follower' , Auth::id())
        ->get ();

        $post=\DB::table('follows')
        ->join('posts' , 'follows.follow' , 'posts.user_id')
        ->join('users' , 'follows.follow' ,'users.id')
        ->where('follows.follower' , Auth::id())
        ->get();

        // $count=\DB::table('follows')
        // ->where('follows.follower' , Auth::id())
        // ->count()

        return view('follows.followList' , compact('list','post'));

    }


    //フォロワーリスト(フォロワー表示),(投稿表示)
    public function followerList() {
       $list=\DB::table('follows')
       ->join('users' , 'follows.follower' , 'users.id')
       ->where('follows.follower' , Auth::id())
       ->get () ;
      
        $post=\DB::table('follows')
        ->join('posts' , 'follows.follower' , 'posts.user_id')
        ->join('users' , 'follows.follow' ,'users.id')
        ->where('follows.follow' , Auth::id())
        ->get();

        // $count=\DB::table('follows')
        // ->where('follows.follow' , Auth::id())
        // ->count();

       return view ('follows.followerList' , compact('list','post'));

    }


    //相手プロフィール
    public function partnerProfile($id) {
        // dd($id);
        $users=User::where('id',$id)
        ->first();
        // dd($users);
        
        $follow=\DB::table('follows')
        ->where('follower' , Auth::id())
        ->get()
        ->toArray();
        // dd($follow);

        $post=\DB::table('posts')
        ->where('user_id' , $id)
        ->get();
        // dd($post);

        return view ('follows.partnerProfile',compact('users','follow','post'));
    }

    // $follow=\DB::table('follows')
    //     ->where('follower' , Auth::id())
    //     ->get()
    //     ->toArray();

    // 編集機能

    public function edit (Request $request) {
        // dd($request->input('id'));

        \DB::table('posts')
        ->where('id', $request->input('id'))
        ->update([
            'posts' => $request->input('edit'),
        ]);

        return redirect('/top');
    }


   

    //フォロワー投稿一覧
    // public function followerList() {
    //     $list=\DB::table('follows')
    //     ->join('psts' , 'follows.follower' , 'users.id')
    //     ->where('follows.follower' , Auth::id())
    //     ->get();

    //     return view ('follows.followerList' , compact('list'));

    // }
    

}
