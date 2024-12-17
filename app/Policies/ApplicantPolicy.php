<?php

namespace App\Policies;

use App\Models\Applicant;
use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ApplicantPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Applicant $applicant): bool
    {
        return ($applicant->user->is($user) || $applicant->job->user->is($user));
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Applicant $applicant): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Applicant $applicant): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Applicant $applicant): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Applicant $applicant): bool
    {
        return false;
    }

    public function canApply(User $user, Job $job): bool
    {
        // Logic for applicant creation
        if ($job->user_id === $user->id) {
            return false;
        }

        $hasApplicant = $job->applicants()->where('user_id', $user->id)->exists();

        return !$hasApplicant;
    }

    public function viewAll(User $user,Job $job){
        return $job->user->is($user);
    }


    
}
