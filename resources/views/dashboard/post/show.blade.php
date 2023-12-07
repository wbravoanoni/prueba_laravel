@extends('dashboard.post.layout')



@section('title','Mostrar Post')
@section('titlePage','Mostrar Post')


@section('content')
    <h1>Mostrar Post: {{$post->title}}</h1>
    <p>slug: {{$post->slug}}</p>
    <p>Descripcion: {{$post->description}}</p>
    <p>Contenido: {{$post->content}}</p>
    <p>Descripcion: {{$post->description}}</p>
    <p>Posted {{$post->posted}}</p>
@endsection
