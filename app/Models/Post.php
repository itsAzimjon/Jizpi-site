<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',  
        'image',
        'title',
        'description',
        'mult_image',
    ];

    protected $casts = [
        'mult_image' => 'array', 
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
