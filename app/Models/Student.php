<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['email', 'name', 'role','faculty_id', 'profile_pic'];

    public $timestamps = false; // Disable automatic management of timestamps


    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function learns()
    {
        return $this->hasMany(Learn::class);
    }

    public function submits()
    {
        return $this->hasMany(Submit::class);
    }}
