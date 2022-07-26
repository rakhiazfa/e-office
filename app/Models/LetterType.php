<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterType extends Model
{
    use HasFactory;

    /**
     * Get letter category of letter type
     */
    public function letterCategory()
    {
        return $this->belongsTo(LetterCategory::class, 'category_id', 'id');
    }
}
