<?php

namespace App\Service;

use App\Http\Requests\CreateJobRequest;
use App\Models\Job;
use App\Models\User;
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

    public function getAllJobs(int $perPage = 6){
        $jobs = Job::recent()->paginate($perPage);
        return $jobs;
    }

    
    public function getRecentJobs(){
        $recentJobs = Job::recent()->take(3)->get();
        return $recentJobs;
    }

 
    public function createJob(CreateJobRequest $createJobRequest){
        $user = Auth::user();
        $user->jobList()->create($createJobRequest->all());
    }
    public function update(Job $job,CreateJobRequest $request){
        $job->update($request->all());
    }
    public function deleteJob(Job $job){
        $job->delete();
    }

    public function getLoggedInUserJobs(int $perPage = 5){
        $user = Auth::user();
        $jobs = $user->jobList()->
        recent()
        ->paginate($perPage);
        return $jobs;
    }
}
