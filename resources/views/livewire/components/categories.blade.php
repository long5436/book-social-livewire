<div>
    <ul>
        @foreach ($categories as $item)
            <li class="inline-block">
                <a href="#"
                    class="inline-block text-primary border border-primary/40 py-2 px-3 me-1 mb-2 rounded-full hover:bg-primary/5">{{ $item->name }}</a>
            </li>
        @endforeach
    </ul>
</div>
