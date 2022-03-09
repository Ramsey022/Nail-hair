<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use Auth;
use Image;
class UserController extends Controller
{
    public function profile(){
        return view('profile', array('user' => Auth::user()));
    }

    public function update_avatar(Request $request){

        if($request->hasFile('avatar')){
            $user= Auth::user();
            if ($user->avatar!='default.jpg'){
                File::delete(public_path('/uploads/avatars/'.$user->avatar));
            }
            $avatar = $request->file('avatar');
            $filename = time(). '.'. $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save( public_path('/uploads/avatars/'.$filename));


            $user->avatar=$filename;
            $user->save();
        }
        return view('profile', array('user' => Auth::user()));
    }
}
