<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'cleanliness_level', 'activity_level', 'priority_score'];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
