<?php

use App\Http\Controllers\StoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/notice-board', [StoryController::class, 'index'])->name('notice-board.index');
Route::get('/getApprovedStories', [StoryController::class, 'getApprovedStories'])->name('getApprovedStories');
Route::get('/story/create', [StoryController::class, 'create'])->name('story.create');
Route::post('/story', [StoryController::class, 'store'])->name('story.store');
Route::get('/link_click/{id}', [StoryController::class, 'link_click'])->name('link_click');


