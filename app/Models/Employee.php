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
     * Get employee job
     */
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id', 'id');
    }
}
