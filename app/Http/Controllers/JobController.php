<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJobRequest;
use App\Models\Job;
use App\Service\JobService;
use Illuminate\Http\Request;

class JobController extends Controller
{
    //
    public function __construct(
        public JobService $jobService
    ) {
        //
    }




    public function index()
    {

        $jobs = $this->jobService->getAllJobs();

        return view("jobs.index")->with('jobs', $jobs);
    }
    public function show($id)
    {
        $job = $this->jobService->findJobById($id);
        if (empty($job)) {
            return redirect()->route('home');
        }
        return view('jobs.show')->with('job', $job);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(CreateJobRequest $createJobRequest)
    {
        $this->jobService->createJob($createJobRequest);
        return redirect()->back();
    }
}
