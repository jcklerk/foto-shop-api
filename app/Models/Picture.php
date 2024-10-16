<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

        protected $fillable = [
        'img',
        'processed',
        'searchText',
        'thumbnail',
    ];

    public function run()
    {
        return $this->belongsTo(Run::class);
    }
}
