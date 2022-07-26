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
     * Get jobs of job level
     */
    public function jobs()
    {
        return $this->hasMany(Job::class, 'job_level_id', 'id');
    }
}
