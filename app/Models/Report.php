<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['area_id', 'description', 'status'];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}

