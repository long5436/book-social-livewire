{{-- {{ route('book.about', $book->slug . '-' . $book->id) }} --}}
<a href="{{ route('book.about', $book->slug . '-' . $book->id) }}"
    class="bg-white hover:-translate-y-1 hover:shadow-md transition-transform">
    <img src="{{ asset('imgs/books/' . $book->photo) }}" onerror="this.src='{{ asset('images/no_image.png') }}'"
        alt="" class="aspect-[2/2.8] overflow-hidden rounded-t-md w-full object-cover">
    <div class="px-2 pb-2">
        <h3 class="font-medium pt-2">{{ $book->name }}</h3>
        <div class="pb-1">
            <i class="fa-solid fa-star text-xxs text-yellow-500"></i>
            <i class="fa-solid fa-star text-xxs text-yellow-500"></i>
            <i class="fa-solid fa-star text-xxs text-yellow-500"></i>
            <i class="fa-solid fa-star text-xxs text-yellow-500"></i>
            <i class="fa-solid fa-star text-xxs text-gray-500"></i>
        </div>
        <div class="text-sm">

            <div class="inline-block pe-3 me-2 ">
                <span>Lượt đọc: </span>
                <span class="ms-1">{{ $book->read_count }}</span>
            </div>
            <div class="inline-block">
                <span>Lượt mua: </span>
                <span class="ms-1">34</span>
            </div>

        </div>
    </div>
</a>
