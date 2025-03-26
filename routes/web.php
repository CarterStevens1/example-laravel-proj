<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => [
            [
                'id' => 1,
                'title' => 'Director',
                'salary' => '£50,000'
            ],
            [
                'id' => 2,
                'title' => 'Programmer',
                'salary' => '£45,000'
            ],
            [
                'id' => 3,
                'title' => 'Teacher',
                'salary' => '£40,000'
            ],
        ]
    ]);
});

Route::get('/jobs/{jobID}', function ($jobID) {
    $jobs = [
        [
            'id' => 1,
            'title' => 'Director',
            'salary' => '£50,000'
        ],
        [
            'id' => 2,
            'title' => 'Programmer',
            'salary' => '£45,000'
        ],
        [
            'id' => 3,
            'title' => 'Teacher',
            'salary' => '£40,000'
        ],
    ];

    $job = Arr::first($jobs, fn($job) => $job['id'] == $jobID);

    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
