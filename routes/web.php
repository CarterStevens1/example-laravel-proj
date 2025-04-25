<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/jobs', function () {
    // $jobs = Job::all();
    // dd($jobs[0]->title);

    // good for small queries if larger make sure pagination exists
    $jobs = Job::with('employer')->latest()->simplePaginate(4);

    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

// Create Job
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// To show a slug
// Route::get('/jobs/{post:slug}', function (Post $post)

// Show Job
// Wild cards should be close to the bottom
Route::get('/jobs/{job}', function (Job $job) {
    // $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});

// Stores Job
Route::post('/jobs', function () {
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
});
// Edit job
Route::get('/jobs/{job}/edit', function (Job $job) {
    // $job = Job::find($id);

    return view('jobs.edit', ['job' => $job]);
});

// Update job
Route::patch('/jobs/{job}', function (Job $job) {
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
});

// Delete job
Route::delete('/jobs/{job}', function (Job $job) {
    // Authorise (On hold...)

    // Delete the job
    // $job = Job::findOrFail($id);
    // $job->delete();
    // OR
    $job->delete();

    // redirect to the job page
    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});
