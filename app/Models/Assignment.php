<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
        // Specify that the model should not use the updated_at column
        public $timestamps = false;

        // If you want to keep using created_at, specify it in $dates
        const CREATED_AT = 'created_at';
        const UPDATED_AT = null; // Disable updated_at
    
    // Define fillable fields for mass assignment
    protected $fillable = [
        'title',
        'course_id',
        'lecturer_id',
        'faculty_id',
        'created_at',
        'assignmentDetails_file',
        'dateline',
        'status'
    ];
    
    public function Teach()
    {
        return $this->belongsTo(Teach::class);
    }


    public function submits()
    {
        return $this->hasMany(Submit::class);
    }}
