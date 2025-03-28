<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Job
{
    public static function all(): array
    {
        return [
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
    }

    public static function find(int $id): array
    {
        $job = Arr::first(static::all(), fn($job) => $job['id'] == $id);

        // $job could be null
        if (! $job) {
            abort(404);
        } else {
            return $job;
        }
    }
};
