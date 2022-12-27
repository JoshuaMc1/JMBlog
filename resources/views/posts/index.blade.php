<x-app-layout>
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
            @foreach ($posts as $post)
                <article class="@if ($loop->first) md:col-span-2 @endif w-full h-80 bg-cover bg-center"
                    style="background-image: url(@if ($post->image) {{ Storage::url($post->image->url) }} @else https://cdn.pixabay.com/photo/2020/11/28/06/15/cold-5783718_960_720.jpg @endif)">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <div class="py-2">
                            @foreach ($post->tags as $tag)
                                <a class="inline-block px-3 h-6 bg-{{ $tag->color }} text-white rounded-full"
                                    href="{{ route('posts.tag', $tag) }}">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                        <h1 class="text-4xl {{ $post->text_color }} leading-8 font-bold">
                            <a href="{{ route('posts.show', $post) }}">
                                {{ $post->name }}
                            </a>
                        </h1>
                    </div>
                </article>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
