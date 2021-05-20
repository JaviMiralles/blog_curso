<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['published_at'];

    public function getRouteKeyName()
    {
        return 'url';
    }



    public function category() // $post->category->name
    {

        return $this->belongsTo(Category::class);
        //conectamos la categoria padre (Post) -> con la categoría hijo para acceder a sus propiedades


    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function scopePublished($query)
    {
        $query->whereNotNull('published_at')
        ->where('published_at','<=', Carbon::now())
                    ->latest('published_at');

    }
}
