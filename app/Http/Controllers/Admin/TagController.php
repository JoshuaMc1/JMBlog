<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.tags.index')
            ->only('index');
        $this->middleware('can:admin.tags.create')
            ->only('create', 'store');
        $this->middleware('can:admin.tags.edit')
            ->only('edit', 'update');
        $this->middleware('can:admin.tags.destroy')
            ->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = [
            'emerald-600' => 'Color esmeralda',
            'green-500' => 'Color verde',
            'violet-500' => 'Color violeta',
            'orange-500' => 'Color naranja',
            'pink-500' => 'Color rosado',
            'HotPink' => 'Rosa vivo',
            'red-650' => 'Color rojo',
            'IndianRed' => 'Color rojo indio',
            'purple-500' => 'Color morado',
            'LightSalmon' => 'Color salmon claro',
            'Coral' => 'Color coral',
            'LightSeaGreen' => 'Color verde mar claro',
            'Turquoise' => 'Color turquesa'
        ];

        return view('admin.tags.create', compact('colors'));
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
            'slug' => ['required', 'unique:tags'],
            'color' => ['required']
        ]);

        $tag = Tag::create($request->all());
        return to_route('admin.tags.edit', compact('tag'))->with('info', 'La etiqueta se a creado con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        $colors = [
            'emerald-600' => 'Color esmeralda',
            'green-500' => 'Color verde',
            'violet-500' => 'Color violeta',
            'orange-500' => 'Color naranja',
            'pink-500' => 'Color rosado',
            'HotPink' => 'Rosa vivo',
            'red-650' => 'Color rojo',
            'IndianRed' => 'Color rojo indio',
            'purple-500' => 'Color morado',
            'LightSalmon' => 'Color salmon claro',
            'Coral' => 'Color coral',
            'LightSeaGreen' => 'Color verde mar claro',
            'Turquoise' => 'Color turquesa'
        ];

        return view('admin.tags.edit', compact('tag', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => ['required'],
            'slug' => ['required', "unique:tags,slug,$tag->id"],
            'color' => ['required']
        ]);

        $tag->update($request->all());
        return to_route('admin.tags.edit', $tag)->with('info', 'La etiqueta se actualizo con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return to_route('admin.tags.index')->with('info', 'La etiqueta se elimino con éxito');
    }
}
