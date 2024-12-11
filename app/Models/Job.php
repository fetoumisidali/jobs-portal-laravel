<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Job extends Model
{

    use HasFactory;
    protected $table = 'listing_jobs';

    protected $fillable = [
        'title',
        'location',
        'requirements',
        'remote',
        'company_name',
        'company_logo',
        'contact_email',
        'job_type',
        'category',
        'description',
        'salary',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function scopeRecent($query, $limit = 3)
    {
        return $query->orderBy('created_at', 'desc')->take($limit);
    }
}
