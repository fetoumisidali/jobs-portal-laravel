<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function bookmarkedByUsers():BelongsToMany{
        return $this->belongsToMany(User::class, 'user_job_bookmarks')
        ->withTimestamps();
    }
}
