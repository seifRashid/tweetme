<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // $idea = Idea:: create(
        //     [ 'content' => request()->get('idea','') ]
        // );

        return view("dashboard", [
            "ideas"=> Idea :: orderBy('created_at','desc')->paginate(20)
        ]);
    }
}
