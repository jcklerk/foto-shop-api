<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Run extends Model
{
    use HasFactory;



    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
