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
                                <textarea name="body" id="editor" rows="10" class="form-control" placeholder="Ingresa aquí el contenido completo de la publicación">
                                </textarea>
                            </div>                        
                        </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-body">

                        <!-- Selector de fechas -->
                        <div class="form-group">
                            <label>Fecha de publicación:</label>

                            <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="published_at" class="form-control pull-right" id="datepicker">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Categorías</label>
                            <select class="form-control">
                                <option value="">Selecciona una categoría</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id}}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Etiquetas</label>
                            <select class="form-control select2" multiple="multiple" data-placeholder="Selecciona una etiqueta" style="width: 100%;">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>    
                                @endforeach
                            </select>                           
                        </div>

                        <div class="form-group">
                            <label for="extractoPublicacion">Resumen de la publicación</label>
                            <textarea name="excerpt" rows="6" class="form-control" placeholder="Ingresa aquí el resumen de la publicación">
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Guardar publicación</button>
                </div>                
            </div>
        </form>
    </div>
@stop

@push('styles')
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="/adminlte/plugins/datepicker/datepicker3.css">
    <!-- Select2 -->
  	<link rel="stylesheet" href="/adminlte/plugins/select2/select2.min.css">
@endpush

@push('scripts')
    <!-- bootstrap datepicker -->
    <script src="/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <!-- Select2 -->
    <script src="/adminlte/plugins/select2/select2.full.min.js"></script>
    
    <script>
        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        });

        //CKeditor
        CKEDITOR.replace('editor');
        
        //Select2
        $(".select2").select2();
    </script>
@endpush