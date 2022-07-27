<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Get employees of job
     */
    public function employees()
    {
        return $this->hasMany(Employee::class, 'job_id', 'id');
    }

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
    public function parent()
    {
        return $this->belongsTo(Job::class, 'job_id', 'id');
    }

    /**
     * Get job childrens
     */
    public function childrens()
    {
        return $this->hasMany(Job::class, 'job_id', 'id');
    }
}
