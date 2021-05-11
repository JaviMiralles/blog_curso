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

    <div class="box">
        <div class="box-header">
          <h3 class="box-title">Todos los post</h3>
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
