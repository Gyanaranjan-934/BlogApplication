<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //each category can have many blog posts 
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
