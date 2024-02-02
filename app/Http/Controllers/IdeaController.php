<?php

namespace App\Http\Controllers;
use App\Models\Idea;

use Illuminate\Http\Request;

class IdeaController extends Controller
{

    public function show(Idea $idea) {
        return view('ideas.show', compact('idea'));
    }

    public function edit(Idea $idea) {

        $editing = true;

        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea) {

        $validated = request()->validate([
            'content'=> 'required|min:3|max:240'
        ]);

        $idea->update($validated);

        return redirect()->route('dashboard', $idea->id)->with('success','Your Idea was edited success');
    }

    public function store()
    {
        $validated = request()->validate([
            'content'=> 'required|min:3|max:240'
        ]);

        $validated['user_id'] = auth()->id();

        //store the idea in the database
        Idea::create($validated);

        // $idea = Idea:: create(
        //     $validated
        //     // [ 'content' => request()->get('content','') ]
        //     // request()->all()
        // );

        return redirect()->route('dashboard')->with('success','Idea created successfuly');
    }

    public function destroy( Idea $idea){

        $idea->delete();

        return redirect()->route('dashboard')->with('success','Idea deleted successfully😁');
    }
}
