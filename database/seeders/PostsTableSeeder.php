<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();
        Category::truncate();

        $category = new Category;
        $category->name = "empleo";
        $category->save();

        $category = new Category;
        $category->name = "prestaciones";
        $category->save();



        $post = new Post;
        $post->title = "Mi primer post";
        $post->excerpt = "Extractor del segundo post";
        $post->body = "<p>El requisito para inscribirse a una o varias de estas numerosas vacantes es estar <strong>dado de alta como demandante de empleo </strong>en Andalucía, así como estar al corriente de sellar la demanda de empleo. Sin embargo, hasta el 31 de mayo no habrá que estar pendiente de este trámite, porque";
        $post->published_at = Carbon::now();
        $post->category_id = 1;
        $post->save();

        $post = new Post;
        $post->title = "Mi segundo post";
        $post->excerpt = "Extractor del segundo post";
        $post->body = "<p>El requisito para inscribirse a una o varias de estas numerosas vacantes es estar <strong>dado de alta como demandante de empleo </strong>en Andalucía, así como estar al corriente de sellar la demanda de empleo. Sin embargo, hasta el 31 de mayo no habrá que estar pendiente de este trámite, porque";
        $post->published_at = Carbon::now();
        $post->category_id = 1;
        $post->save();


        $post = new Post;
        $post->title = "Mi tercer post";
        $post->excerpt = "Extractor del segundo post";
        $post->body = "<p>El requisito para inscribirse a una o varias de estas numerosas vacantes es estar <strong>dado de alta como demandante de empleo </strong>en Andalucía, así como estar al corriente de sellar la demanda de empleo. Sin embargo, hasta el 31 de mayo no habrá que estar pendiente de este trámite, porque";
        $post->published_at = Carbon::now();
        $post->category_id = 2;
        $post->save();

        $post = new Post;
        $post->title = "Mi Cuarto post";
        $post->excerpt = "Extractor del segundo post";
        $post->body = "<p>El requisito para inscribirse a una o varias de estas numerosas vacantes es estar <strong>dado de alta como demandante de empleo </strong>en Andalucía, así como estar al corriente de sellar la demanda de empleo. Sin embargo, hasta el 31 de mayo no habrá que estar pendiente de este trámite, porque";
        $post->published_at = Carbon::now();
        $post->category_id = 1;
        $post->save();




    }
}
