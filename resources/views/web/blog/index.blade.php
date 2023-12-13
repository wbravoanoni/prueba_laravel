@extends('web.blog.layout')

@section('content')
    <h1 class="px-2 py-2 text-center">Pagina principal web</h1>


    <x-web.blog.post.index :posts="$posts">
        <h1>Listado Principal de post</h1>
        @slot('header')
        <h1>Slot con nombre</h1>
        @endslot()

        @slot("slot_una_linea",'slot una linea')
    </x-web.blog.post.index>
@endsection