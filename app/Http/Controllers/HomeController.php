<?php

namespace App\Http\Controllers;

use App\Service\JobService;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct(
        public JobService $jobService
    ) {
        //
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $jobs = $this->jobService->getRecentJobs();
        return view("pages.index")->with('jobs', $jobs);
    }
}
