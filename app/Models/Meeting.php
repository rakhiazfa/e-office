<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    /**
     * Get meeting members
     */
    public function members()
    {
        return $this->belongsToMany(Employee::class, 'meeting_members');
    }
}
