<?php

namespace App\Service;

use App\Http\Requests\CreateJobRequest;
use App\Models\Job;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class JobService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAllJobs(int $perPage = 6)
    {
        $query = Job::query();

        if (request()->query('title') != '') {
            $title = request()->query('title');
            $query->where('title', 'like', "%$title%");
        }

        if (request()->query('location') != '') {
            $location = request()->query('location');
            $query->where('location', 'like', "%$location%");
        }

        $jobs = $query->recent()->paginate($perPage);

        return $jobs;
    }


    public function getJobsByUsername(string $username,int $perPage = 6){

        $user = User::where('username', $username)->firstOrFail();

        $jobs = $user->jobList()->recent()->paginate($perPage);
        return $jobs;
    }
    


    public function getRecentJobs()
    {
        $recentJobs = Job::recent()->take(3)->get();
        return $recentJobs;
    }


    public function createJob(CreateJobRequest $createJobRequest)
    {
        $user = Auth::user();
        $user->jobList()->create($createJobRequest->validated());
    }
    public function update(Job $job, CreateJobRequest $request)
    {
        $job->update($request->validated());
    }
    public function deleteJob(Job $job)
    {
        $job->delete();
    }

    public function getLoggedInUserJobs(int $perPage = 5)
    {
        $user = Auth::user();
        $jobs = $user->jobList()->recent()
            ->paginate($perPage);
        return $jobs;
    }
}
