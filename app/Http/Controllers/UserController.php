<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Follow;
use App\Photo;

class UserController extends Controller
{
   public function profile( $username )
   {
   	$user = User::get()->where('username', $username)->first();

   	if ($user) {
   		$photos = Photo::get()->where('user_id', $user->id);
   		return view('user.profile', ['user' => $user, 'photos' => $photos]);
   	}
   	return view('user.404');
   }

   public function all()
   {
       $users = User::get();
       return view('user.list', ['users' => $users]);
   }
}
