<?php

use App\Models\Job;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SessionController;
use Illuminate\Http\RedirectResponse as Redirect;
use App\Http\Controllers\RegisteredUserController;
use App\Jobs\TranslateJob;

Route::get('/test', function() {
    $job = Job::first();
    TranslateJob::dispatch($job);
    // dispatch(function() {
    //     logger('hello from the queue');
    // })->delay(5);
    return "Done";
});

Route::view(uri: '/', view: 'home');
Route::view(uri: '/contact', view: 'contact');

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

//This simplifies the below code
//Route::resource('jobs', JobController::class);
Route::controller(JobController::class)->group(function () {
    Route::get(uri:'/jobs', action: 'index');
    Route::get(uri: '/jobs/create', action: 'create')->middleware('auth');
    Route::post(uri: '/jobs', action: 'store')->middleware('auth');
    Route::get(uri: '/jobs/{job}', action: 'show');
    Route::get(uri: '/jobs/{job}/edit', action: 'edit')->middleware('auth')->can('edit', 'job'); // uses the magic binding
    Route::patch(uri: '/jobs/{job}', action: 'update')->middleware('auth')->can('edit', 'job');
    Route::delete(uri: '/jobs/{job}', action: 'delete')->middleware('auth')->can('edit', 'job');
});


