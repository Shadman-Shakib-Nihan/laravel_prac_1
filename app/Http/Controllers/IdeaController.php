<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   

    public function index()
{
    $ideas = Idea::where('user_id', Auth::id())->get();

    return view('ideas.index', compact('ideas'));
}








    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ideas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => ['required', 'min:10', 'max:255'],
        ]);

        Idea::create([
            'description' => request('description'),
            'state' => 'pending',
            'user_id' => Auth::user()->id,
        ]);

        return redirect('/ideas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        return view('ideas.show', [
            'idea' => $idea,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        return view('ideas.edit', [
            'idea' => $idea,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Idea $idea)
    {
        $idea->update([
            'description' => request('description'),
        ]);

        return redirect('/ideas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {

        $idea->delete();

        return redirect('/ideas');
    }
}
