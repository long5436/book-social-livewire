<div>
    <livewire:components.meta />

    <div class="max-w-screen-lg mx-auto px-4 md:px-8 xl:px-0 pt-8">

        <div>
            <h1 class="text-3xl font-medium text-primary">{{ $post->name }}</h1>

            <div class="pt-3">
                <a class="bg-primary/20 py-1 px-3 rounded-full text-primary hover:bg-primary/90 hover:text-white"
                    href="{{ route('book.about', $post->book->slug . '-' . $post->book->id) }}">{{ $post->book->name }}</a>
            </div>
        </div>

        <div class="markdown-content">
            <x-markdown>
                {{ $post->content }}
            </x-markdown>
        </div>

        <div class="pt-4 border-t">
            <livewire:components.comments :post="$post" :comments="$comments" />
        </div>
    </div>

</div>
