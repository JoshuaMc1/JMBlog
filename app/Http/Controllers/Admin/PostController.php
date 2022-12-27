<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.posts.index')
            ->only('index');
        $this->middleware('can:admin.posts.create')
            ->only('create', 'store');
        $this->middleware('can:admin.posts.edit')
            ->only('edit', 'update');
        $this->middleware('can:admin.posts.destroy')
            ->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Post::create($request->all());

        if ($request->file('file')) {
            $url = Storage::put('posts', $request->file('file'));

            $post->image()->create([
                'url' => $url,
            ]);
        }

        Cache::flush();

        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }

        return to_route('admin.posts.edit', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('author', $post);

        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('author', $post);

        $post->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('posts', $request->file('file'));

            if ($post->image()) {
                Storage::delete($post->image->url);

                $post->image->update([
                    'url' => $url,
                ]);
            } else {
                $post->image()->create([
                    'url' => $url,
                ]);
            }
        }

        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }

        Cache::flush();

        return to_route('admin.posts.edit', $post)->with('info', 'El post se actualizo con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('author', $post);

        $post->delete();

        Cache::flush();

        return to_route('admin.posts.index')->with('info', 'El post se elimino con éxito');
    }
}
