<?php

use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\IdeaController;
use App\Models\Idea;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;



/*
|--------------------------------------------------------------------------
| Home Route
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect('/ideas');
});

Route::middleware('auth')->group(function () {

    Route::get('/ideas', [IdeaController::class, 'index']);
    Route::get('/ideas/create', [IdeaController::class, 'create']);
    Route::post('/ideas', [IdeaController::class, 'store']);
    Route::delete('/logout', [SessionController::class, 'destroy'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisterUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);

});

/*
|--------------------------------------------------------------------------
| Edit idea
|--------------------------------------------------------------------------
*/

Route::get('/ideas/{idea}/edit', [IdeaController::class, 'edit']);

/*
|--------------------------------------------------------------------------
| Update idea
|--------------------------------------------------------------------------
*/

Route::patch('/ideas/{idea}', [IdeaController::class, 'update']);

/*
|--------------------------------------------------------------------------
| Show single idea
|--------------------------------------------------------------------------
*/
Route::get('/ideas/{idea}', [IdeaController::class, 'show']);

/*
|--------------------------------------------------------------------------
| Delete all ideas
|--------------------------------------------------------------------------
*/
Route::delete('/ideas/{idea}', [IdeaController::class, 'destroy']);

Route::get('/admin', function () {
    return "this is admin";
});