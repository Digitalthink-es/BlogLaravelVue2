@extends('admin.layout')

@section('header')
<h1>
    POSTS
    <small>Listado</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Blog</li>
</ol>
@endsection

@section('content')

    <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Listado de publicaciones</h3>
          <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-plus"></i>
            Crear publicación
          </button>

          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="posts-table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>ID</th>
              <th>Título</th>
              <th>Extracto</th>
              <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->excerpt }}</td>
                        <td>
                            <a href="#" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                        </td>                        
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
            <tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->    
@endsection

@push('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="/adminlte/plugins/datatables/dataTables.bootstrap.css">
@endpush

@push('scripts')
  <!-- DataTables -->
  <script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="/adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>

  <script>
    $(function () {
      $('#posts-table').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });
  </script>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <form method="POST" action="{{ route('admin.posts.store') }}">

      {{ csrf_field() }}

      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Agrega el título de tu nueva publicación</h4>
          </div>
          <div class="modal-body">
              <div class="form-group {{ count($errors) > 0 ? 'has-error' : '' }}">
                <!--<label for="tituloPublicacion">Título de la publicación</label>-->
                <input name="title" 
                      type="text" 
                      class="form-control"
                      value=" {{ old('title') }}"
                      placeholder="Ingresa aquí el título de la publicación">
              </div>            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button class="btn btn-primary">Crear publicación</button>
          </div>
        </div>
      </div>
    </form>
  </div>

@endpush