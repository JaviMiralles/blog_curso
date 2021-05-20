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
    <form method="POST" action="{{ route('admin.posts.update', $post)}}">
    {{ csrf_field() }} {{method_field('PUT')}}
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-body">
                <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                    <label for="">Título de Post</label>
                    <input name="title" value="{{old('title', $post->title)}}" placeholder="Título de la publicación"  type="text" class="form-control">
                    {!!$errors->first('title','<span class="help-block">:message</span>')!!}
                </div>
                <div class="box-body {{$errors->has('body') ? 'has-error' : ''}}">
                    <label for="">Contenido del post</label>
                    <textarea rows="10" name="body" id="editor" class="form-control" placeholder="ingresa el contenido">{{old('body', $post->body)}}</textarea>
                    {!!$errors->first('body','<span class="help-block">:message</span>')!!}
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-body">
                <div class="form-group">
                    <label>Fecha publicación:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input
                        name="published_at"
                        type="text"
                        class="form-control pull-right"
                        id="datepicker"
                        value="{{old('published_at', $post->published_at ? $post->published_at->format('d/m/Y') : null)}}">
                    </div>
                </div>
                <div class="form-group {{$errors->has('category') ? 'has-error' : ''}}">
                <label for="">Categorias</label>
                <select name="category" class="form-control">
                    <option value="">Selecciona una categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}"
                                {{old('category', $post->category_id) == $category->id ? 'selected' : ''}}
                        >{{$category->name}}</option>
                    @endforeach
                </select>
                {!!$errors->first('category','<span class="help-block">:message</span>')!!}
                <div class="form-group">
                    <label>Etiquetas</label>
                    <select name="tags[]" class="form-control select2"
                            multiple="multiple"
                            data-placeholder="selecciona una o más categoría"
                            style="width: 100%;">
                            @foreach ($tags as $tag)
                            <option {{collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : ''}} value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                    </select>
                </div>
                </div>
                <div class="form-group {{$errors->has('excerpt') ? 'has-error' : ''}}">
                    <label for="">Extracto</label>
                    <textarea name="excerpt" id="excerpt" class="form-control" placeholder="ingresa el extracto de la publicación">{{old('excerpt', $post->excerpt)}}</textarea>
                    {!!$errors->first('excerpt','<span class="help-block">:message</span>')!!}
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Guardar publicación</button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection


@push('styles')
<link rel="stylesheet" href="/adminlte/plugins/datepicker/datepicker3.css">
<link rel="stylesheet" href="/adminlte/plugins/select2/select2.min.css">
@endpush
@push('scripts')
<script src="/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script src="/adminlte/plugins/select2/select2.full.min.js"></script>
<script>
CKEDITOR.replace('editor');
$('.select2').select2();
$('#datepicker').datepicker({
  autoclose: true
});
</script>
@endpush
