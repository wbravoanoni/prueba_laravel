@extends('dashboard.post.layout')



@section('title','Listado de post')
@section('titlePage','Listado de Post')

@section('content')

<a href="{{route('post.create')}}">Crear Post</a>


<table>
    <thead>

    </thead>
    <tbody>
        <tr>
            <td>id</td>
            <td>title</td>
            <td>category</td>
            <td>slug</td>
            <td>description</td>
            <td>content</td>
            <td>posted</td>
            <td>acciones</td>
        </tr>

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
                <a href="{{route('post.edit',$item)}}">Editar</a>
                <a href="{{route('post.show',$item)}}">Ver</a>
                <form action="{{route('post.destroy',$item->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
        
    </tbody>
</table>

{{$registros->links()}}
    
@endsection