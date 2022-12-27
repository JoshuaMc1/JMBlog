<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.categories.index')
            ->only('index');
        $this->middleware('can:admin.categories.create')
            ->only('create', 'store');
        $this->middleware('can:admin.categories.edit')
            ->only('edit', 'update');
        $this->middleware('can:admin.categories.destroy')
            ->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'slug' => ['required', 'unique:categories'],
        ]);

        $category = Category::create($request->all());
        return to_route('admin.categories.edit', $category)->with('info', 'La categoría se creo con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['required'],
            'slug' => ['required', "unique:categories,slug,$category->id"],
        ]);

        $category->update($request->all());
        return to_route('admin.categories.edit', $category)->with('info', 'La categoría se actualizo con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('admin.categories.index')->with('info', 'La categoría se a eliminado con éxito');
    }
}
