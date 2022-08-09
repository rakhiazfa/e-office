<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterReference extends Model
{
    use HasFactory;

    protected $fillable = [
        'file', 'label',
        'reference_route', 'reference_id',
    ];

    /**
     * Get letter from the reference
     */
    public function letter()
    {
        return $this->belongsTo(Letter::class, 'letter_id', 'id');
    }

    /**
     * Get letter reference from the reference
     */
    public function reference()
    {
        return $this->belongsTo(Letter::class, 'reference_id', 'id');
    }
}
