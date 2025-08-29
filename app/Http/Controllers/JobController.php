<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Mail\JobPosted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

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
        if (Auth::guest()) {
            return redirect('/login');
        }
        return view(view: 'jobs.create');
    }

    public function store() {
        if (Auth::guest()) {
            return redirect('/login');
        }
        request()->validate(rules: [
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);

        $job = Job::create(attributes: [
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => Auth::user()->employer->id,
        ]);
        //dd($job);
        Mail::to($job->employer->user->email)->queue(
          new JobPosted($job)
        );

        return redirect(to: '/jobs');
    }

    public function show(Job $job) {
        return view(view: 'jobs.show', data: [ 'job' => $job ]);
    }

    public function edit(Job $job) {
        //Auth::user()->can/cannot() is a thing!
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
