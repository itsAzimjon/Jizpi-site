<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secondnav extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstnav_id',
        'title',
        'image',
        'description',
    ];

    public function firstnav(){
        return $this->belongsTo(Firstnav::class);
    }

    public function thirdnav(){
        return $this->hasMany(Thirdnav::class);
    }
}

