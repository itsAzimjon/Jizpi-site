<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thirdnav extends Model
{
    use HasFactory;

    protected $fillable = [
        'secondnav_id',
        'pdf',
        'title',
        'link',
    ];

    public function secondnav(){
        return $this->belongsTo(Secondnav::class);
    }
}
