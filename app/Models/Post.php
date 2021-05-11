<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $dates = ['published_at'];



    public function category() // $post->category->name
    {

        return $this->belongsTo(Category::class);
        //conectamos la categoria padre (Post) -> con la categoría hijo para acceder a sus propiedades


    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
