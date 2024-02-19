<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function follow()
    {
        $follower = auth()->user();
        $follower = following()->attach($user);
    }
    public function unfollow()
    {

    }
}
