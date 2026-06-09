<?php

use Illuminate\Support\Facades\Route;
use App\Models\Idea;

/*
|--------------------------------------------------------------------------
| Home Route
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect('/ideas');
});

/*
|--------------------------------------------------------------------------
| create idea
|--------------------------------------------------------------------------
*/

Route::get('/ideas/create', function () {
   return view('ideas.create');
});


/*
|--------------------------------------------------------------------------
| store idea
|--------------------------------------------------------------------------
*/
Route::post('/ideas', function () {

    $idea = request('description');

    Idea::create([
        'description' => $idea, 
        'state' => 'pending',
    ]);

    return redirect('/ideas');
});

/*
|--------------------------------------------------------------------------
| Show all ideas
|--------------------------------------------------------------------------
*/
Route::get('/ideas', function () {

    $ideas = Idea::all();

    return view('ideas.index', [
        'ideas' => $ideas,
    ]);
});

/*
|--------------------------------------------------------------------------
| Edit idea
|--------------------------------------------------------------------------
*/

Route::get('/ideas/{idea}/edit', function (Idea $idea) {
   return view('ideas.edit', [
        'idea' => $idea,
    ]);
});


/*
|--------------------------------------------------------------------------
| Update idea
|--------------------------------------------------------------------------
*/

Route::patch('/ideas/{idea}', function (Idea $idea) {
    $idea->update([
        'description' => request('description'),          
    ]);

    return redirect('/ideas');
});


/*
|--------------------------------------------------------------------------
| Show single idea
|--------------------------------------------------------------------------
*/
Route::get('/ideas/{idea}', function (Idea $idea) {
   return view('ideas.show', [
        'idea' => $idea,
    ]);
});



/*
|--------------------------------------------------------------------------
| Delete all ideas
|--------------------------------------------------------------------------
*/
Route::delete('/ideas/{idea}', function (Idea $idea) {

   $idea->delete();


    return redirect('/ideas');
});