<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(User $user)
    {
        // $idea = Idea:: create(
        //     [ 'content' => request()->get('idea','') ]
        // );
        $ideas = Idea::orderBy('created_at','desc');

        if(request()->has('search'))
        {
            $ideas = $ideas->where('content','like','%' . request()->get('search',' ') .'%');
        }

        return view("dashboard", compact('user'), [
            "ideas"=> $ideas->paginate(2)
        ]);
    }
}
