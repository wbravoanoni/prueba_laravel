@extends('dashboard.post.layout')

@section('title','Listado de post')
@section('titlePage','Listado de Post')

@section('content')

<a href="{{route('post.create')}}">Crear Post</a>


<table class="table mb-3">
    <thead>
        <tr>
            <th>id</th>
            <th>title</th>
            <th>category</th>
            <th>slug</th>
            <th>description</th>
            <th>content</th>
            <th>posted</th>
            <th>acciones</th>
        </tr>
    </thead>
    <tbody>


        @foreach ($registros as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->title}}</td>
            <td>{{$item->category->title}}</td>
            <td>{{$item->slug}}</td>
            <td>{{$item->description}}</td>
            <td>{{$item->content}}</td>
            <td>{{$item->posted}}</td>
            <td>
                <a class="btn btn-warning my-2" href="{{route('post.edit',$item)}}">Editar</a>
                <a class="btn btn-primary my-2" href="{{route('post.show',$item)}}">Ver</a>
                <form action="{{route('post.destroy',$item->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-danger my-2" type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
        
    </tbody>
</table>

{{$registros->links()}}
    
@endsection