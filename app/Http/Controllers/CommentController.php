<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Idea $idea)
    {
        $comment = new Comment();
        $comment->Idea_id = $idea -> id;
        $comment -> user_id= auth() -> user()->id;
        $comment->content = request()->get('content');
        $comment->save();

        return redirect()->route('idea.show', $idea->id)->with('success','Comment made successfully🥰');
    }
}
