@extends('admin.layout')
@section('header')
<h1>Todos los post</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Post</li>
</ol>
@stop
@section('content')

    <h2>Post (NewsArticle)</h2>

    <div class="box box-primary">
        <div class="box-header">
        <h3 class="box-title">Todos los post</h3>
        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Crear post</button>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table id="post-table" class="table table-bordered table-striped">
        <thead>
            <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Descripción</th>
            <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

                @foreach ($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->excerpt}}</td>
                    <td>
                        <a href="#" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                        <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div><!-- /.box-body -->
    </div><!-- /.box -->

@endsection
@push('styles')
<link rel="stylesheet" href="/adminlte/plugins/datatables/dataTables.bootstrap.css">
@endpush
@push('scripts')
<script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {
        $('#post-table').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false
        });
    });
</script>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{ route('admin.posts.store')}}">
        {{ csrf_field() }}
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agrega un título para la nueva publicación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                {{-- <label for="">Título de Post</label> --}}
                <input name="title" value="{{old('title')}}" placeholder="Título de la publicación"  type="text" class="form-control">
                {!!$errors->first('title','<span class="help-block">:message</span>')!!}
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary">Crear publicación</button>
        </div>
    </div>
    </div>
    </form>
</div>
@endpush
