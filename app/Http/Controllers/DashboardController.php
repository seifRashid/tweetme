<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $Idea = new Idea();
        $Idea->content = "Hello Rashid, how are you doing man😎";
        $Idea->likes = 0;
        $Idea->save();

        return view("dashboard", [
            "ideas"=> Idea :: orderBy('created_at','desc')->get()
        ]);
    }
}
