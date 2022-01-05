<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Http\Controllers\Controller;

class PhotosController extends Controller
{
    public function store(Post $post)
    {
    	$this->validate(request(), [
    		'photo' => 'required|image|max:4096'
		]);

        $photo = request()->file('photo'); // el campo photo es el definido como paramName en la inicialización del objeto Dropzone
    }
}
