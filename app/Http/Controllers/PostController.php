<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View

    {   
        $registros = Post::orderBy('id','desc')->paginate(2);
        return view('dashboard.post.index', ['registros' => $registros]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {   
        $categories = Category::pluck('id','title');
        $publish = ['yes','not'];
        return view('dashboard.post.create',compact('categories','publish')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request) : RedirectResponse
    {   
        Post::create($request->all());
        return to_route('post.index')->with('status','registro Creado');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post) : View
    {
        $categories = Category::pluck('id','title');
        return view('dashboard.post.show',compact('categories','post')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View
    {
        $categories = Category::pluck('id','title');
        return view('dashboard.post.edit',compact('categories','post')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post) : RedirectResponse
    {   

        $data = $request->validated();

        if(isset($data['image']))
        {
            $data["image"] = $filename = time().'.'. $data['image']->extension();
            $request->image->move(public_path('image'),$filename);
        }
        //dd($data);
        $post->update($data);
        return to_route('post.index')->with('status','registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('post.index')->with('status','registro Eliminado');
    }
}
