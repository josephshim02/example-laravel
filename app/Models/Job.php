<?php


namespace App\Models;
use Illuminate\Support\Arr;

class Job {
    public static function all(): array
    {
        return [
            [
                'title' => 'Software Engineer',
                'salary' => '$120,000',
                'id' => 1
            ],
            [
                'title' => 'Data Scientist',
                'salary' => '$130,000',
                'id' => 2
            ],
            [
                'title' => 'Product Manager',
                'salary' => '$140,000',
                'id' => 3
            ]
        ];
    }
    public static function find($id): array
    {
        $job = Arr::first(static::all(), fn($job) => $job['id'] == $id);

        if (! $job) {
            abort(404, 'Job not found');
        }
        return $job;
    }
}
