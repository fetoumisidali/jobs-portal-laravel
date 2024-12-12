<?php

namespace App\Http\Controllers;

use App\Service\JobService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function __construct(
        public JobService $jobService
    
    ) {
        
    }

    public function index(){
        $user = Auth::user();
        $jobs = $this->jobService->getLoggedInUserJobs();
        return view("pages.dashboard",compact("user","jobs"));
    }
}
