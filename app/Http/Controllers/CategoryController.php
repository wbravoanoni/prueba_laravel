<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $categories = Category::orderBy('id','desc')->paginate(5);
        return view('dashboard.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        Category::create($request->all());
        return redirect()->route('category.index')->with('status','Categoria creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category) : View
    {
        return view('dashboard.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category) : View
    {
        return view('dashboard.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category) :RedirectResponse
    {   
        $category->update($request->all());
        return to_route('category.index')->with('status','registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {   
        $category->delete();
        return to_route('category.index')->with('status','Categoria registro Eliminada');
    }
}
