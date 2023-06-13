@php
    $metaData = $chap;
    $metaData->photo = $book->photo;
    $metaData->description = $book->description;
    // dd($metaData);
@endphp


<div class="mx-auto lg:px-8 pt-8 overflow-x-clip">
    <livewire:components.meta :data="$metaData" />

    <div class="max-w-screen-lg mx-auto px-6 ">
        <div class="border-b mb-4">
            <h2 class="text-xl font-bold">{{ $book->name }}</h2>
            <h3 class="text-xl">{{ $chap->name }}</h3>

            <div class="hidden md:block">
                <livewire:components.chap-control :chap="$chap" />
            </div>

        </div>
        {{-- <p>{{ $book->description }}</p> --}}
        <div class="markdown-content text-xl">
            <x-markdown>
                {{ $chapContent->content }}
            </x-markdown>
        </div>

        <div class="hidden md:block">
            <livewire:components.chap-control :chap="$chap" />
        </div>

        <div class="md:hidden">
            <livewire:components.chap-control-mobile :chap="$chap" />
        </div>
    </div>

    <div class="max-w-screen-lg mx-auto pt-24 px-6 ">
        <livewire:components.comments :book="$book" :comments="$comments" />
    </div>


    <div class="max-w-screen-lg mx-auto pt-5 px-6 ">
        <h2 class="font-medium text-2xl py-4">Sách cùng danh mục</h2>
        <livewire:components.book-grid :books="$cateBooks" />
    </div>

</div>
