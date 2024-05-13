<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = ['title', 'dateline', 'status', 'assignmentDetails_file'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function submits()
    {
        return $this->hasMany(Submit::class);
    }}
