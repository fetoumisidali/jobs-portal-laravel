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

    public function getAllJobs(){
        $jobs = Job::paginate(6);
        return $jobs;
    }

    
    public function getRecentJobs(){
        $recentJobs = Job::recent(3)->get();
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
}
