<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = ['published_at']; // Trata la fecha creada como instancia de tipo Carbon

    // 1 Post pertenece a una categoría
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // 1 post puede tener muchas etiquetas
    public function tags()
    {
    	return $this->belongsToMany(Tag::class);
    }    
}