<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse as Redirect;

Route::get(uri: '/', action: function (): View {
    return view(view: 'home');
});

Route::get(uri: '/jobs', action: function (): View {
    $jobs = Job::with(relations: 'employer')->latest()->paginate(3);
    //$jobs = Job::with(relations: 'employer')->get(); // eager loading
    //$jobs = Job::all(); // lazy loading

    return view(view: 'jobs.index',data: ['jobs'=>$jobs]);
});

//NEED TO PUT THIS BEFORE THE WILDCARD ID
Route::get(uri: '/jobs/create', action: function (): View {
    return view(view: 'jobs.create');
});

Route::post(uri: '/jobs', action: function (): Redirect {
    request()->validate(rules: [
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);

    Job::create(attributes: [
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1, //hardcoded for now
    ]);
    return redirect(to: '/jobs');
});

Route::get(uri: '/jobs/{id}', action: function ($id): View {

    $job = Job::find(id: $id);
    return view(view: 'jobs.show', data: [ 'job' => $job ]);
});

Route::get(uri: '/contact', action: function (): View {
    return view(view: 'contact');
});

