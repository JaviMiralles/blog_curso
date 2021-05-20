<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{


    public function index()
    {
        $posts = Post::all();



        return view('admin.posts.index', compact('posts'));
    }

    // public function create()
    // {
    //     $categories = Category::all();
    //     $tags = Tag::all();

    //     return view('admin.posts.create', compact('categories','tags'));
    // }

    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required']);

        $post = Post::create([
            'title' => $request->get('title'),
            'url' => Str::slug($request->get('title')),
            ]);

        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('categories','tags','post'));

    }



    public function update(Post $post, Request $request)
    {
        // Validacion
        //Post::create($request->all());
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'excerpt' => 'required',
            'category' => 'required'
        ]);

        $post->title = $request->get('title');
        $post->url = Str::slug($request->get('title'));
        $post->body = $request->get('body');
        $post->excerpt = $request->get('excerpt');
        $post->published_at = $request->filled('published_at') ? Carbon::parse($request->get('published_at')) : null;
        $post->category_id = $request->get('category');
        //etiquetas
        $post->save();
        $post->tags()->sync($request->get('tags'));
        return back()->with('flash', 'tu publicación ha sido guardada');
    }
}
