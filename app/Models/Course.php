<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['code', 'name'];

    public function teaches()
    {
        return $this->hasMany(Teach::class);
    }

    public function learns()
    {
        return $this->hasMany(Learn::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }}
