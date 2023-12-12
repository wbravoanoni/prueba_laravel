@extends('dashboard.post.layout')

@section('content')

@section('title','Editar Post')
@section('titlePage','Editar Post')

<form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="title">Titulo</label><br>
    <input type="text" name="title" id="title" value='{{$post->title}}'>

    @error('title')
    <br>
    <span>* {{ $message }}</span>
    <br>
    @enderror

    <br><br>

    <label for="category_id">Categorias</label><br>
    <select name="category_id" id="category_id">
        @foreach ($categories as $title => $id)
        <option {{$post->category_id == $id ? 'selected' : ''}} value="{{$id}}" > {{$title}} </option>
        @endforeach
    </select>
    <br><br>

    <label for="">Posteado</label><br>
    <select name="posted" id="">
            @php($titles = ['yes','not'])

        @foreach ($titles as $key)
        <option {{$post->posted == $key ? 'selected' : ''}} value="{{$key}}" > {{$key}} </option>
      @endforeach
    </select>
    <br><br>

    <label for="content">Contenido</label><br>
    <textarea type="text" name="content" id="content">{{$post->content}}</textarea>
    @error('content')
    <br>
    <span>* {{ $message }}</span>
    <br>
    @enderror

    <br><br>

    <label for="description">Descripción</label><br>
    <textarea type="text" name="description" id="description">{{$post->description}}</textarea>
    @error('description')
    <br>
    <span>* {{ $message }}</span>
    <br>
    @enderror
    
    <br><br>

    @error('slug')
    <br>
    <span>* {{ $message }}</span>
    <br>
    @enderror
    
    <br><br>

    <label for="image">Image</label>
    <input id="image" type="file" name="image">



    <button class="btn btn-success" type="submit">Enviar</button>
</form>
    
@endsection