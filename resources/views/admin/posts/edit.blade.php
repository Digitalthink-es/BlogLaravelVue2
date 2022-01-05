@extends('admin.layout')

@section('header')
<h1>
    POSTS
    <small>Editar publicación</small>
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
        <form method="POST" action="{{ route('admin.posts.update', $post) }}">

            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="col-md-8">
                <div class="box box-primary">
                        <div class="box-body">

                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                                                    
                            <div class="form-group {{ count($errors) > 0 ? 'has-error' : '' }}">
                                <label for="tituloPublicacion">Título de la publicación</label>
                                <input name="title" 
                                       type="text" 
                                       class="form-control"
                                       value=" {{ old('title', $post->title) }}"
                                       placeholder="Ingresa aquí el título de la publicación">
                            </div>
                        
                            <div class="form-group {{ count($errors) > 0 ? 'has-error' : '' }}">
                                <label for="contenidPublicacion">Contenido de la publicación</label>
                                <textarea name="body"   
                                          id="editor" 
                                          rows="10" 
                                          class="form-control"
                                          placeholder="Ingresa aquí el contenido completo de la publicación"
                                >
                                    {{ old('body', $post->body) }}
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
                            <input type="text"
                                   value="{{ old('published_at', $post->published_at ? $post->published_at->format('d/m/Y') : null) }}"
                                   name="published_at"
                                   class="form-control pull-right"
                                   id="datepicker">
                            </div>
                        </div>

                        <div class="form-group {{ count($errors) > 0 ? 'has-error' : '' }}">
                            <label>Categorías</label>
                            <select name="category" class="form-control">
                                <option value="">Selecciona una categoría</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category', $post->category_id) == $category->id ? 'selected' : ''}}
                                        >
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Etiquetas</label>
                            <select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Selecciona una etiqueta" style="width: 100%;">
                                @foreach ($tags as $tag)
                                <option {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }}
                                        value="{{ $tag->id }}">{{ $tag->name }}
                                </option>
                                @endforeach
                            </select>                           
                        </div>

                        <div class="form-group {{ count($errors) > 0 ? 'has-error' : '' }}">
                            <label>Resumen de la publicación</label>
                            <textarea 
                                name="excerpt"
                                rows="6"
                                class="form-control"
                                placeholder="Ingresa aquí el resumen de la publicación"
                            >{{ old('excerpt', $post->excerpt ) }}</textarea>
                        </div>

                        <div class="form-group">
                            <div class="dropzone">

                            </div>
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
    <!-- DropzoneJS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/dropzone.css">
@endpush

@push('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/min/dropzone.min.js"></script>

    <!-- bootstrap datepicker -->
    <script src="/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <!-- Select2 -->
    <script src="/adminlte/plugins/select2/select2.full.min.js"></script>
    
    <script>
        //Date picker
        $('#datepicker').datepicker({
            autoclose: true,
            locale: 'es',
            format: 'dd/mm/yyyy',
        });

        //CKeditor
        CKEDITOR.replace('editor');
        
        //Select2
        $(".select2").select2();

        //DropzoneJS
        new Dropzone('.dropzone', {
            url: '/admin/posts/{{ $post->url }}/photos',
            dictDefaultMessage: 'Arrastre las imágenes aquí',
            headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },            
        });

        Dropzone.autoDiscover = false;
    </script>

@endpush