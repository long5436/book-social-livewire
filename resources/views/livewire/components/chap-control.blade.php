<div class="w-full flex justify-center gap-2 py-3">

    @if ($chap->order_by > 1)
        @foreach ($chaps->where('order_by', $chap->order_by - 1) as $item)
            {{-- {{ $item }} --}}
            <a href="{{ route('book.chap', [$bookSlug, $item->slug . '-' . $item->id]) }}" wire:navigate
                class="inline-block bg-primary text-white px-6 py-2 rounded-md text-base hover:opacity-90">
                Chương trước
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
                class="inline-block bg-primary text-white px-6 py-2 rounded-md text-base hover:opacity-90">
                Chương tiếp theo
            </a>
        @endforeach
    @endif

</div>
