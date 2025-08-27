<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Models\Job;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse as Redirect;
use Illuminate\Support\Facades\Redis;

Route::view(uri: '/', view: 'home');
Route::view(uri: '/contact', view: 'contact');

Route::resource('jobs', JobController::class);
//This simplifies the below code
// Route::controller(JobController::class)->group(function () {
//     Route::get(uri:'/jobs', action: 'index');
//     Route::get(uri: '/jobs/create', action: 'create');
//     Route::post(uri: '/jobs', action: 'store');
//     Route::get(uri: '/jobs/{job}', action: 'show');
//     Route::get(uri: '/jobs/{job}/edit', action: 'edit');
//     Route::patch(uri: '/jobs/{job}', action: 'update');
//     Route::delete(uri: '/jobs/{job}', action: 'delete');
// });


