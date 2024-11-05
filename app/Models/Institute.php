<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    protected $fillable = ['name', 'address', 'email'];

    // Relationships
    public function faculties()
    {
        return $this->hasMany(Faculty::class);
    }

    public function courses()
    {
        return $this->hasManyThrough(Course::class, Faculty::class);
    }
}
