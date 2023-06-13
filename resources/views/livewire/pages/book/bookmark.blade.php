@php
    
@endphp


<div class="max-w-screen-xl mx-auto md:px-8 xl:px-0 pt-8 ">
    <livewire:components.meta />

    <div class="max-w-screen-lg mx-auto pt-2 px-6 ">

        <div class="px-4 md:px-0">
            <h2 class="font-medium text-2xl py-4">Danh sách đánh dấu của bạn</h2>

            <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 grid-flow-row gap-5">
                @foreach ($bookmarks as $index => $item)
                    @php
                        $book = $item->book;
                    @endphp
                    <div class="relative hover:-translate-y-1 transition-transform">
                        <a href="{{ route('book.about', $book->slug . '-' . $book->id) }}" class="">
                            <img src="{{ asset('imgs/books/' . $book->photo) }}"
                                onerror="this.src='{{ asset('images/no_image.png') }}'" alt=""
                                class="aspect-[2/2.8] overflow-hidden rounded-t-md w-full object-cover">
                            <div class="px-2 pb-2">
                                <h3 class="font-medium pt-2">{{ $book->name }}</h3>
                            </div>
                        </a>
                        <div wire:click="deleteBookmark({{ $item->id }}, {{ $index }})"
                            class="inline-flex w-9 h-9 rounded-full bg-black/20 backdrop-blur
                        absolute -top-4 -end-4 hover:bg-black/30 cursor-pointer">
                            <i class="fa-solid fa-xmark m-auto text-lg text-white"></i>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center py-4">
                <livewire:components.pagination :currentPage="$page" :totalPage="$totalPages" />
            </div>
        </div>

        <div class="px-4 md:px-0">
            <h2 class="font-medium text-2xl py-4">Danh mục sách</h2>
            <livewire:components.categories />
        </div>
    </div>
</div>
