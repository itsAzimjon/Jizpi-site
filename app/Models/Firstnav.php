<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firstnav extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nav_id'
    ];

    public function secondnav(){
        return $this->hasMany(Secondnav::class);
    }

}
