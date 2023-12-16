<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
       return response()->json(Post::paginate(10));
    }

    public function all(){
        return response()->json(Post::get()); 
    }

    public function store(StoreRequest $request)
    {   
        return response()->json( Post::create($request->validated()));
    }

    public function show(Post $post)
    {
        return response()->json($post);
    }

    public function update(StoreRequest $request, Post $Post)
    {
        $Post->update($request->validated());
        return response()->json($Post);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json("ok");
    }

    public function posts(Category $category){
        $posts= Post::with("category")
        ->where("category_id",$category->id)
        ->get();

        return response()->json($posts);
    }

    public function slug(Post $post){
        $post->category;
        return response()->json($post);
    }
}
