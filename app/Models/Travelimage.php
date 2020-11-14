<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travelimage extends Model
{
    use HasFactory;
    protected $fillable = [
        'img',
    ];

    // Relation many to one
    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }
}
