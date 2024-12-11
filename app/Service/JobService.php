<?php

namespace App\Service;

use App\Http\Requests\CreateJobRequest;
use App\Models\Job;
use App\Models\User;

class JobService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAllJobs(){
        $jobs = Job::paginate(6);
        return $jobs;
    }

    
    public function getRecentJobs(){
        $recentJobs = Job::recent(3)->get();
        return $recentJobs;
    }

    public function findJobById($id){
        $job = Job::find($id);
        return $job;
    }

    public function createJob(CreateJobRequest $createJobRequest){
        $user = User::find(1);
        $user->jobList()->create($createJobRequest->all());
    }
}
