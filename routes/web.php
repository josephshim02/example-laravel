<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use Illuminate\Contracts\View\View;

Route::get(uri: '/', action: function (): View {
    return view(view: 'home');
});

Route::get(uri: '/jobs', action: function (): View {
    $jobs = Job::with(relations: 'employer')->get(); // eager loading
    //$jobs = Job::all(); // lazy loading

    return view(view: 'jobs',data: ['jobs'=>$jobs]);
});

Route::get(uri: '/jobs/{id}', action: function ($id): View {

    $job = Job::find(id: $id);
    return view(view: 'job', data: [ 'job' => $job ]);
});

Route::get(uri: '/contact', action: function (): View {
    return view(view: 'contact');
});

