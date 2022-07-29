<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik', 'phone', 'ktp', 'ktp_address',
        'city', 'address', 'place_of_birth', 'date_of_birth',
        'religion', 'gender', 'blood_group', 'marital_status',
    ];

    /**
     * Get user of employee
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get superior of employee
     */
    public function superior()
    {
        return $this->belongsTo(Employee::class, 'superior_id', 'id');
    }

    /**
     * Get subordinates of employee
     */
    public function subordinates()
    {
        return $this->hasMany(Employee::class, 'superior_id', 'id');
    }

    /**
     * Get employee job level
     */
    public function jobLevel()
    {
        return $this->belongsTo(JobLevel::class, 'job_level_id', 'id');
    }

    /**
     * Get employee job
     */
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id', 'id');
    }

    /**
     * Get the letter that this employee checks
     */
    public function letters()
    {
        return $this->belongsToMany(Letter::class, 'letter_checkers');
    }

    /**
     * Get member meetings
     */
    public function meetings()
    {
        return $this->belongsToMany(Meeting::class, 'meeting_members');
    }
}
