<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
       return response()->json(Category::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function all(){
        return response()->json(Category::get()); 
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {   
        return response()->json( Category::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response()->json($category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Category $category)
    {
        $category->update($request->validated());
        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json("ok");
    }

    public function slug($slug){
        $post = Category::where("slug",$slug)->firstOrFail();
        return response()->json($post);
    }
}
