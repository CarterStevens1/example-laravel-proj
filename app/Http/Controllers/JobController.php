<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        // $jobs = Job::all();
        // dd($jobs[0]->title);

        // good for small queries if larger make sure pagination exists
        $jobs = Job::with('employer')->latest()->simplePaginate(4);

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }
    public function create()
    {
        return view('jobs.create');
    }
    // Wild cards should be close to the bottom
    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }
    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);

        return redirect('/jobs');
    }
    public function edit(Job $job)
    {
        // $job = Job::find($id);
        return view('jobs.edit', ['job' => $job]);
    }
    public function update(Job $job)
    {
        // Authorise (On hold...)
        // Validate
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        // Update the job
        // $job = Job::findOrFail($id);

        // $job->title = request('title');
        // $job->salary = request('salary');
        // $job->save();
        // OR
        $job->update([
            'title' => request('title'),
            'salary' => request('salary')
        ]);

        // redirect to the job page
        return redirect('/jobs/' . $job->id);
    }
    public function destroy(Job $job)
    {
        // Authorise (On hold...)

        // Delete the job
        // $job = Job::findOrFail($id);
        // $job->delete();
        // OR
        $job->delete();

        // redirect to the job page
        return redirect('/jobs');
    }
}
