<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    //

    public function index(){
        $user = Auth::user();
        $jobs = $user->bookmarkedJobs()->paginate(6);

        return view("jobs.saved", compact("jobs"));
    }

    // Bookmark Job
    public function store(Job $job){

        $user = Auth::user();
        if($user->bookmarkedJobs()->where('job_id',$job->id)->exists()){
            return redirect()->back()->with('error','Job Already Bookmarked');
        }
        $user->bookmarkedJobs()->attach($job->id);

        return redirect()->back()->with('success','Job Saved Successfully');
    }


    // Remove Bookmark

    public function destroy(Job $job){
        $user = Auth::user();
        if (!$user->bookmarkedJobs()->where('job_id', $job->id)->exists()) {
            return redirect()->back()->with('error', 'Job Not Bookmarked');
        }
        $user->bookmarkedJobs()->detach($job->id);

        return redirect()->back()->with('success', 'Bookmark Removed Successfully');
    }
}
