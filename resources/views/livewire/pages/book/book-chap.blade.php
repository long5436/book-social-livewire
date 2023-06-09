<div class="mx-auto lg:px-8 pt-8 overflow-x-clip">

    <div class="max-w-screen-lg mx-auto pt-24 px-6 ">
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
        <livewire:components.comments :chap="$chap" :comments="$comments" />
    </div>

</div>
