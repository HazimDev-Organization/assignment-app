<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $fillable = ['user_id','email', 'name', 'role','faculty_id', 'profile_pic'];
    public $timestamps = false; // Disable automatic management of timestamps

    public function user()
    {
        return $this->hasOne(User::class);
    }
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
