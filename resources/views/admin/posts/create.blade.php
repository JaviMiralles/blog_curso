@extends('admin.layout')
@section('header')
<h1>Todos los post</h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ route('admin.posts.index') }}"><i class="fa fa-list"></i> Posts</a></li>
    <li class="active">Crear</li>
  </ol>
  @stop
@section('content')

<h1>Crear un post</h1>
<div class="row">
    <form action="">
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box">
                <div class="box-body">
                    <label for="">Título de Post</label>
                    <input name="title" placeholder="Título de la publicación"  type="text" class="form-control">
                </div>
                <div class="box-body">
                    <label for="">Extracto</label>
                    <textarea name="excerpt" id="excerpt" class="form-control" placeholder="ingresa el extracto de la publicación"></textarea>
                </div>
                <div class="box-body">
                    <label for="">Contenido del post</label>
                    <textarea rows="10" name="body" id="excerpt" class="form-control" placeholder="ingresa el contenido"></textarea>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-body">
                <div class="form-group">
                  <label for="">Fecha publicación</label>
                  <textarea name="" id="" cols="30" rows="10"></textarea>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection
