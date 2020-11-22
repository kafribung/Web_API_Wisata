<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travelimage extends Model
{
    use HasFactory;

    //Touches
    protected $touches = ['travel'];

    protected $fillable = [
        'img',
    ];

    // Relation many to one
    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }

     // Mutator
    public function getTakeImgAttribute()
    {
        return url('storage', $this->img);
    }
}
