<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;
    
    // RouteKeyName
    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    // Relation one to many (travelImage)
    public function travelImages()
    {
        return $this->hasMany('App\Models\Travelimage');
    }

    // Relation one to many
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Mutator
    public function getTakeImgAttribute()
    {
        return url('storage', $this->bg);
    }

}
