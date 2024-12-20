<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJobRequest;
use App\Models\Job;
use App\Models\User;
use App\Service\JobService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    use AuthorizesRequests;

    public function __construct(public JobService $jobService)
    {
        //
    }

    public function index()
    {
        $jobs = $this->jobService->getAllJobs();
        return view("jobs.index", compact('jobs'));
    }


    public function create()
    {
        return view('jobs.create');
    }

    public function store(CreateJobRequest $request)
    {
        $this->jobService->createJob($request);
        return redirect()->route('jobs.create')->with('success', 'Job Created');
    }

    public function show(Job $job)
    {

        $alreadyApplied = false;
        $applicant = null;
        $user = Auth::user();

        if ($user) {
            $alreadyApplied = $job->applicants()
                ->where(
                    'user_id',
                    $user->id
                )->exists();

            if ($alreadyApplied) {
                $applicant = $job->applicants()
                    ->where('user_id', $user->id)
                    ->first();
            }
            return view(
                'jobs.show',
                compact('job', 'alreadyApplied', 'applicant',)
            );
        }

        return view('jobs.show', compact('job'));
    }


    public function edit(Job $job)
    {
        $this->authorize('update', $job);
        return view('jobs.edit', compact('job'));
    }

    public function update(Job $job, CreateJobRequest $request)
    {
        $this->authorize('update', $job);
        $this->jobService->update($job, $request);

        return redirect()
            ->route('jobs.show', $job->id)
            ->with('success', 'Job Updated');
    }

    public function destroy(Job $job)
    {
        $this->authorize('delete', $job);
        $this->jobService->deleteJob($job);

        if (request()->query('from') == 'dashboard') {
            return redirect()->back()
                ->with('success', 'Job Deleted');
        }

        return redirect()
            ->route('home')
            ->with('success', 'Job Deleted');
    }



    public function showUserJobs($username)
    {

        $jobs = $this->jobService->getJobsByUsername($username);

        return view('jobs.user-jobs', compact('username', 'jobs'));
    }
}
