<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;

class UsersController extends Controller
{
    public function profile(){
        return view('users.profile');
    }
    public function search(){
        return view('users.search');
    }

    public function update( Request $request){
        User::where('id',auth::id())
        ->update([
            'username' => $request->input('username'),
            'mail' => $request->input('mail'),
            'password' => bcrypt($request->input('newPassword')),
            'bio' => $request->input('bio'),
        ]);
        if(!empty($request->file('image'))){
            $file_name = $request->file('image')->getClientOriginalName();            
            User::where('id',auth::id())
        ->update([
            'images' => $file_name,
        ]);

        $request->file('image')->storeAs('images',$file_name, 'update');//ファイルの保存


        }

        
        return redirect('/profile');
    } 
    
}
