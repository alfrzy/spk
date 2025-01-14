<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['area_id', 'cleaner_name', 'schedule_date'];

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
}

