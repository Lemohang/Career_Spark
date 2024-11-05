<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable = ['name', 'institute_id'];

    // Relationships
    public function institute()
    {
        return $this->belongsTo(Institute::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
