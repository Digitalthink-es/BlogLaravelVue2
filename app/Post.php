<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = ['published_at']; // Trata la fecha creada como instancia de tipo Carbon
}