<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use App\Tag;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /*
    public function store(Request $request)
    {
        //dd($request->published_at);

        // Validación
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
            'tags' => 'required',
            'excerpt' => 'required',
        ]);

        // Almacenamiento
        $post = new Post();
        $post->title = $request->title;
        $post->url = str_slug($request->title);
        $post->body = $request->body;
        $post->excerpt = $request->excerpt;
        $post->published_at = is_null($request->published_at) ? null : Carbon::parse($request->published_at);
        $post->category_id =  $request->category;

        $post->save();

        // Etiquetas
        $post->tags()->attach($request->tags);
        
        return back()->with('flash', 'Tu publicación ha sido creada');
    }
    */

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        // Almacenamiento
        $post = Post::create(['title' => $request->title, 
                              'url' => str_slug($request->title) 
                            ]);

        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }
}
