<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $fillable = ['email', 'name', 'role', 'profile_pic'];
    public $timestamps = false; // Disable automatic management of timestamps


    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function teaches()
    {
        return $this->hasMany(Teach::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

}
