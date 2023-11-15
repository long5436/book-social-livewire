<div>
    <ul>
        @foreach ($categories as $item)
            <li class="inline-block">
                <a href="{{ route('book.cate', $item->slug . '-' . $item->id) }}" wire:navigate
                    class="inline-block text-primary border border-black/10 py-2 px-3 me-1 mb-2 rounded-sm hover:bg-primary/5 bg-white">{{ $item->name }}</a>
            </li>
        @endforeach
    </ul>
</div>
