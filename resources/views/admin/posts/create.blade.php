@extends('admin.layout')

@section('header')
<h1>
    POSTS
    <small>Crear publicación</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('admin.index') }}">
        <i class="fa fa-dashboard"></i> Inicio</a>
    </li>
    <li><a href="{{ route('admin.posts.index') }}">
        <i class="fa fa-list"></i> Posts</a>
    </li>    
    <li class="active">Crear</li>
</ol>
@stop

@section('content')

    <div class="row">
        <form action="">
            <div class="col-md-8">
                <div class="box box-primary">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="tituloPublicacion">Título de la publicación</label>
                                <input name="title" type="text" class="form-control" id="title" placeholder="Ingresa aquí el título de la publicación">
                            </div>

                            <div class="form-group">
                                <label for="contenidPublicacion">Contenido de la publicación</label>
                                <textarea name="body" rows="10" class="form-control" placeholder="Ingresa aquí el contenido completo de la publicación">
                                </textarea>
                            </div>                        
                        </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="extractoPublicacion">Resumen de la publicación</label>
                            <textarea name="excerpt" class="form-control" placeholder="Ingresa aquí el resumen de la publicación">
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop