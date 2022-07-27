<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class JobLevel extends Model
{
    use HasFactory;

    /**
     * Get role of job level
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    /**
     * Get parent of job level
     */
    public function parent()
    {
        return $this->belongsTo(JobLevel::class, 'job_level_id', 'id');
    }

    /**
     * Get children of job level
     */
    public function children()
    {
        return $this->hasOne(JobLevel::class, 'job_level_id', 'id');
    }

    /**
     * Get jobs of job level
     */
    public function jobs()
    {
        return $this->hasMany(Job::class, 'job_level_id', 'id');
    }

    /**
     * Get employees of job level
     */
    public function employees()
    {
        return $this->hasMany(Employee::class, 'job_level_id', 'id');
    }
}
