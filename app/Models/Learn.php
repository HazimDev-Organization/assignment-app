<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Learn extends Model
{
    protected $fillable = [];

    public $timestamps = false; // Disable automatic management of timestamps


    public function teach()
    {
        return $this->belongsTo(Teach::class);
    }
    

    public function student()
    {
        return $this->belongsTo(Student::class);
    }}
