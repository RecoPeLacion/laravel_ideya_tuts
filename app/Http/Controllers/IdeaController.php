<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        //
        $request->validate([
            'content' => 'required|min:3|max:240'
        ]);

        $idea = Idea::create([
            'content' => $request->get('content', '')
        ]);
        
        return redirect()->route('dashboard')->with('success', 'Idea created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        return view('idea.show', compact('idea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        //
        $editing = true;
        return view('idea.show', compact('idea', 'editing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Idea $idea)
    {
        //
        $request->validate([
            'content' => 'required|min:3|max:240'
        ]);

        $idea->content = $request->get('content', '');
        $idea->save();

        return redirect()->route('idea.show', $idea->id)->with('success', 'Idea updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
       $idea->delete();
       return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }
}