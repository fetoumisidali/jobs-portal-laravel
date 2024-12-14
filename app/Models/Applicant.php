<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Applicant extends Model
{
    //
    protected $fillable = [
        "user_id",
        "job_id",
        "full_name",
        "email",
        "message",
        "phone_number"
    ];

    public function job():BelongsTo{
        return $this->belongsTo(Job::class);
    }


    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
