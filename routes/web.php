<?php
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\Auth\SessionController;
Use App\Http\Controllers\IdeaController;
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
| Index
|--------------------------------------------------------------------------
*/
Route::get('/ideas', [IdeaController::class, 'index']);

/*
|--------------------------------------------------------------------------
| create idea
|--------------------------------------------------------------------------
*/

Route::get('/ideas/create', [IdeaController::class, 'create']);


/*
|--------------------------------------------------------------------------
| store idea
|--------------------------------------------------------------------------
*/
Route::post('/ideas', [IdeaController::class, 'store']);    

    



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


Route::get('/register',[RegisterUserController::class, 'create']);
Route::post('/register',[RegisterUserController::class, 'store']);

Route::get('/login',[SessionController::class,'create']);
Route::post('/login',[SessionController::class,'store']);

Route::delete('/logout',[SessionController::class,'destroy']);
