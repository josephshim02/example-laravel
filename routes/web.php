<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse as Redirect;
use Illuminate\Support\Facades\Redis;

Route::get(uri: '/', action: function (): View {
    return view(view: 'home');
});

//Show jobs
Route::get(uri: '/jobs', action: function (): View {
    $jobs = Job::with(relations: 'employer')->latest()->paginate(3);
    //$jobs = Job::with(relations: 'employer')->get(); // eager loading
    //$jobs = Job::all(); // lazy loading

    return view(view: 'jobs.index',data: ['jobs'=>$jobs]);
});

//Create job
//NEED TO PUT THIS BEFORE THE WILDCARD ID
Route::get(uri: '/jobs/create', action: function (): View {
    return view(view: 'jobs.create');
});

//Store job
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

//show one job
Route::get(uri: '/jobs/{id}', action: function ($id): View {
    $job = Job::find(id: $id);
    return view(view: 'jobs.show', data: [ 'job' => $job ]);
});

//edit job
Route::get(uri: '/jobs/{id}/edit', action: function ($id): View {
    $job = Job::find(id: $id);
    return view(view: 'jobs.edit', data: [ 'job' => $job ]);
});

//update job
Route::patch(uri: '/jobs/{id}', action: function ($id): Redirect {
    request()->validate(rules: [
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);
    // authorize (on hold)
    // update job
    $job = Job::findOrFail(id: $id); //OrFail handles an invalid id(or use route model binding)

    $job->update(attributes: [
        'title' => request('title'),
        'salary' => request('salary'),
    ]);
    return redirect(to: "/jobs/{$job->id}");
});

//delete job
Route::delete(uri: '/jobs/{id}', action: function ($id): Redirect {
    // authorize (on hold)
    $job = Job::findOrFail(id: $id)->delete();
    return redirect(to: '/jobs');
});

Route::get(uri: '/contact', action: function (): View {
    return view(view: 'contact');
});

