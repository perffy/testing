<?php

use App\Exceptions\PageNotFoundException;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\TodoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('projects', ProjectController::class)->only(['index', 'show', 'store']);

Route::resource('todos', TodoController::class);

Route::patch('todos/mark/{todo}', [TodoController::class, 'mark'])->name('todos.mark');
Route::patch('todos/view/{todo}', [TodoController::class, 'view'])->name('todos.view');

Route::fallback(function() {
    throw new PageNotFoundException();
});
