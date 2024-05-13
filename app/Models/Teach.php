<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teach extends Model
{
    protected $fillable = [];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }}
