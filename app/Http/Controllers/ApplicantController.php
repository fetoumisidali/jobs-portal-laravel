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

    public function store(CreateApplicantRequest $request,Job $job){


        $this->authorize("canApply", [Applicant::class, $job]);

        $user = Auth::user();

        $data = $request->all();

        $data['job_id'] = $job->id;

        $user->applicants()->create($data);

        return redirect()->back()->with('success','You Applied For The Job Successfully');
        
    }
}
