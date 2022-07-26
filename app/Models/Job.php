<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    /**
     * Get level of job
     */
    public function jobLevel()
    {
        return $this->belongsTo(JobLevel::class, 'job_level_id', 'id');
    }

    /**
     * Get job parent
     */
    public function jobParent()
    {
        return $this->belongsTo(Job::class, 'job_id', 'id');
    }

    /**
     * Get job childrens
     */
    public function jobChildrens()
    {
        return $this->hasMany(Job::class, 'job_id', 'id');
    }
}
