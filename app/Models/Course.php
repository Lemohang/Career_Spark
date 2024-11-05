<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'faculty_id', 'description', 'requirements'];

    // Relationships
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
