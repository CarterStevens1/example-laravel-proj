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
    $jobs = Job::with('employer')->simplePaginate(10);

    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Wild cards should be close to the bottom
Route::get('/jobs/{jobID}', function ($id) {
    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function () {
    $data = request()->all();

    $job = new Job();
    $job->title = $data['title'];
    $job->description = $data['description'];
    $job->salary = $data['salary'];
    $job->save();

    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});
