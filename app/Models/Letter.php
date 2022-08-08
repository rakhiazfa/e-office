<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;

    protected $fillable = [
        'letter_number', 'regarding', 'attachment', 'sender_name',
        'date_of_letter', 'date_of_entry', 'recipient_name', 'note_title',
        'message', 'status',
    ];

    /**
     * Get letter category
     */
    public function category()
    {
        return $this->belongsTo(LetterCategory::class, 'category_id', 'id');
    }

    /**
     * Get type of letter
     */
    public function type()
    {
        return $this->belongsTo(LetterType::class, 'type_id', 'id');
    }

    /**
     * Get destination of letter
     */
    public function destination()
    {
        return $this->belongsTo(Employee::class, 'destination_id', 'id');
    }

    /**
     * Get carbon copy
     */
    public function carbonCopy()
    {
        return $this->belongsTo(Employee::class, 'copy_id', 'id');
    }

    /**
     * Get creator of letter
     */
    public function creator()
    {
        return $this->belongsTo(Employee::class, 'creator_id', 'id');
    }

    /**
     * Get company
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    /**
     * Get meeting
     */
    public function meeting()
    {
        return $this->belongsTo(Meeting::class, 'meeting_id', 'id');
    }

    /**
     * Get checker of letter
     */
    public function checkers()
    {
        return $this->belongsToMany(Employee::class, 'letter_checkers');
    }

    /**
     * Get reference from the letter
     */
    public function references()
    {
        return $this->hasMany(LetterReference::class, 'letter_id', 'id');
    }
}
