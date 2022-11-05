<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Post extends Model
{
    use HasFactory;

    // each post belongs to user 
    public function user(){
        return $this->belongsTo(User::class);
    }

    //each post belongs to a category
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
