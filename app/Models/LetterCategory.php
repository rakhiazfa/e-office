<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterCategory extends Model
{
    use HasFactory;

    /**
     * Get letter types
     */
    public function letterTypes()
    {
        return $this->hasMany(LetterType::class, 'category_id', 'id');
    }

    /**
     * Get letters of category
     */
    public function letters()
    {
        return $this->hasMany(Letter::class, 'category_id', 'id');
    }
}
