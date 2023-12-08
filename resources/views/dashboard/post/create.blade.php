@extends('dashboard.post.layout')

@section('content')

@section('title','Insertar Post')
@section('titlePage','Insertar Post')

<form action="{{route('category.store')}}" method="post">
    @csrf

    <label for="title">Titulo</label><br>
    <input type="text" name="title" id="title" value='{{old('title')}}'>

    @error('title')
    <br>
    <span>* {{ $message }}</span>
    <br>
    @enderror

    <br><br>

    <label for="category_id">Categorias</label><br>
    <select name="category_id" id="category_id">
        @foreach ($categories as $title => $id)
        <option value="{{$id}}" {{(old('category_id', $id) == $id ? 'selected' : '')}} > {{$title}} </option>
        @endforeach
    </select>
    <br><br>

    <label for="">Posteado</label><br>
    <select name="posted" id="">
            @php($titles = ['yes','not'])

        @foreach ($titles as $key)
        <option value="{{$key}}" {{(old('posted', $key) == $key ? 'selected' : '')}} > {{$key}} </option>
      @endforeach
    </select>
    <br><br>

    <label for="content">Contenido</label><br>
    <textarea type="text" name="content" id="content">{{old('content')}}</textarea>
    @error('content')
    <br>
    <span>* {{ $message }}</span>
    <br>
    @enderror

    <br><br>

    <label for="description">Descripción</label><br>
    <textarea type="text" name="description" id="description">{{old('description')}}</textarea>
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

    <button type="submit">Enviar</button>
</form>
    
@endsection