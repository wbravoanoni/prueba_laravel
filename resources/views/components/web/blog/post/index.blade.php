<div>
  {{$slot}}
  {{$header}}

  {{$slot_una_linea}}

  @foreach ($posts as $p)
   <div class="card card-white mb-2">
    <h3>{{$p->title}}</h3>
    <a class="btn btn-primary" href="{{route('web.blog.show',$p->id)}}">Ver</a>
    <p>{{$p->description}}</p>  
  </div>   
  @endforeach
  {{$posts->links()}}
</div>