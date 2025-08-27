<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with(relations: 'employer')->latest()->paginate(3);
        //$jobs = Job::with(relations: 'employer')->get(); // eager loading
        //$jobs = Job::all(); // lazy loading
        return view(view: 'jobs.index',data: ['jobs'=>$jobs]);
    }

    public function create()
    {
        return view(view: 'jobs.create');
    }

    public function store() {
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
    }

    public function show(Job $job) {
        return view(view: 'jobs.show', data: [ 'job' => $job ]);
    }

    public function edit(Job $job) {
        return view(view: 'jobs.edit', data: [ 'job' => $job ]);
    }

    public function update(Job $job) {
        request()->validate(rules: [
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);

        $job->update(attributes: [
            'title' => request('title'),
            'salary' => request('salary'),
        ]);
        return redirect(to: "/jobs/{$job->id}");
    }

    public function destroy(Job $job) {
        $job->delete();
        return redirect(to: '/jobs');
    }
}
