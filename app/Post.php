<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

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

    public function scopePublished($query)
    {
        $query->whereNotNull('published_at') // No mostrar publicaciones sin fecha de publicación
                    ->where('published_at', '<=', Carbon::now()) // No mostrar publicaciones con fecha de publicación posterior al día de hoy
                    ->latest('published_at');
    }
}