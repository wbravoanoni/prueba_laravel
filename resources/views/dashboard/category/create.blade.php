@extends('dashboard.post.layout')

@section('content')

@section('title','Insertar Categoria')
@section('titlePage','Insertar Categoria')

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

    @error('slug')
    <br>
    <span>* {{ $message }}</span>
    <br>
    @enderror
    
    <br><br>

    <button type="submit">Enviar</button>
</form>
    
@endsection