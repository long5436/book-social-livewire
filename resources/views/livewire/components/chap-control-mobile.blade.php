<div
    class="fixed bottom-0 start-0 end-0 bg-white/90 h-13 w-full flex justify-center gap-2 px-4 py-3 border-t border-black/10 backdrop-blur-md">

    @if ($chap->order_by > 1)
        @foreach ($chaps->where('order_by', $chap->order_by - 1) as $item)
            {{-- {{ $item }} --}}
            <a href="{{ route('book.chap', [$bookSlug, $item->slug . '-' . $item->id]) }}" wire:navigate
                class="inline-flex bg-transparent px-6 py-2 rounded-md text-base border border-black/10 items-center hover:border-primary/70">
                <i class="fa-solid fa-chevron-left"></i>
            </a>
        @endforeach
    @endif

    <select wire:model="selectedValue" wire:change="selectChap" name="chap_book_control"
        class="chap_book_control rounded-md border border-gray-300 w-64 outline-primary">
        @foreach ($chaps as $item)
            <option @if ($item->id == $chap->id) @selected(true) @endif value="{{ $item->id }}">
                {{ $item->name }}
            </option>
        @endforeach
    </select>

    @if ($chap->order_by < $chaps->count())
        @foreach ($chaps->where('order_by', $chap->order_by + 1) as $item)
            <a href="{{ route('book.chap', [$bookSlug, $item->slug . '-' . $item->id]) }}" wire:navigate
                class="inline-flex bg-transparent px-6 py-2 rounded-md text-base border border-black/10 items-center hover:border-primary/70">
                <i class="fa-solid fa-chevron-right"></i>
            </a>
        @endforeach
    @endif

</div>
