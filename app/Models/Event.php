<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;



    public function runs()
    {
        return $this->hasMany(Run::class);
    }


    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
