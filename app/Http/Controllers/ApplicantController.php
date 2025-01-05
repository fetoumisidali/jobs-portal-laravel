<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateApplicantRequest;
use App\Models\Applicant;
use App\Models\Job;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{

    use AuthorizesRequests;



    public function index(){

        $user = Auth::user();
        $applicants = $user->applicants()->paginate(5);

        return view("applicants.index",compact("applicants"));
    }

    

    public function store(CreateApplicantRequest $request,Job $job){


        $this->authorize("canApply", [Applicant::class, $job]);

        $user = Auth::user();

        $data = $request->validated();

        $data['job_id'] = $job->id;

        $user->applicants()->create($data);

        return redirect()->back()->with('success','You Applied For The Job Successfully');
        
    }

    public function jobApplicants(Job $job)
    {
        $this->authorize("viewAll", [Applicant::class, $job]);
        $applicants = $job->applicants()->paginate(5);
        return view(
            "applicants.job-applicants",
            compact("job", "applicants")
        );
    }


}
