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

    public function store(Request $request)
    {
        // Validación
        //dd($request->all());

        // Almacenamiento
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->excerpt = $request->excerpt;
        $post->published_at = Carbon::parse($request->published_at);
        $post->category_id =  $request->category;

        $post->save();

        // Etiquetas
        $post->tags()->attach($request->tags);
        
        return back()->with('flash', 'Tu publicación ha sido creada');
    }
}
