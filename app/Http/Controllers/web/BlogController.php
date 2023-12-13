<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where("posted","yes")->paginate(2);
        return view('web.blog.index',compact('posts'));
    }

    public function show(Post $post)
    {   
        $posts = Post::where("posted","yes")->get();
        return view('web.blog.show',compact('post'));
    }

}
