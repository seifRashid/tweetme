<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function follow(User $user)
    {
        $follower = auth()->user();
        $follower->followings()->attach($user);//to add new record in database we use the attach method

        return redirect()->route('users.show',$user->id)->with('success', 'followed successfuly');
    }

    public function unfollow(User $user)
    {
        $follower = auth()->user();
        $follower->followings()->detach($user);//to remove new record in database we use the detach method

        return redirect()->route('users.show',$user->id)->with('success', 'followed successfuly');

    }
}
