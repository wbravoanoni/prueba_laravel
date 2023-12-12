@extends('dashboard.post.layout')

@section('content')

@section('title','Editar Categoria')
@section('titlePage','Editar Categoria')

<form action="{{route('category.update',$category->id)}}" method="post">
    @csrf
    @method('PUT')

    <label for="title">Titulo</label><br>
    <input class="form-control" type="text" name="title" id="title" value='{{$category->title}}'>

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

    <button class="btn btn-success mt-2" type="submit">Enviar</button>
</form>

@if ($errors->any())
        @foreach ($errors->all() as $item)
            <div class="error">
                {{ $item }}
            </div>
            
        @endforeach
            
        @endif
    
@endsection