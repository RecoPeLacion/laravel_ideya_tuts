<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        
        $validated = request()->validate([
            'content' => 'required|min:3|max:240'
        ]);

        $validated['user_id'] = auth()->id();

        Idea::create($validated);
        
        return redirect()->route('dashboard')->with('success', 'Idea created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        //$createdAt = Carbon::parse($idea->created_at);
        //$timeSinceCreation = $createdAt->diffForHumans();
        //var_dump($timeSinceCreation);

        return view('idea.show', compact('idea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        if(auth()->id() !== $idea->user_id) {
            abort(404);
        }

        $editing = true;
        return view('idea.show', compact('idea', 'editing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Idea $idea)
    {
        if(auth()->id() !== $idea->user_id) {
            abort(404);
        }

        $validated = request()->validate([
            'content' => 'required|min:3|max:240'
        ]);

        $idea->update($validated);

        return redirect()->route('idea.show', $idea->id)->with('success', 'Idea updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
        if(auth()->id() !== $idea->user_id) {
            abort(404);
        }

        $idea->delete();
        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }
}
