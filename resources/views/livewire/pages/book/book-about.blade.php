<div>
    <livewire:components.meta :data="$book" />
    <div class="mx-auto lg:px-8 pt-8 overflow-x-clip">
        {{-- max-w-screen-xl  --}}
        <div class="w-full px-0 md:px-0 bg-no-repeat relative">
            <div class="absolute inset-0 -top-32 bg-cover blur-3xl z-0 scale-110 after:bg-black/50 after:inset-0 after:absolute"
                style="background-image: url('{{ asset('imgs/books/' . $book->photo) }}')">

            </div>
            <div class="relative max-w-screen-lg mx-auto block md:flex z-10 text-white px-4 lg:px-0">
                <div class="w-full md:w-3/12">
                    <img src="{{ asset('imgs/books/' . $book->photo) }}" alt="{{ $book->name }}"
                        onerror="this.src='{{ asset('images/no_image.png') }}'"
                        class="w-72 rounded-md aspect-[2/2.8] shadow-lg">
                </div>
                <div class="w-full md:w-9/12 flex items-end ps-0 md:ps-4 mt-7 md:mt-0">
                    <div>
                        <div>
                            <h1 class="font-medium text-2xl">{{ $book->name }}</h1>
                        </div>
                        <p class="pb-2">Tác giả: Tên tác giả</p>

                        <div class="pb-1 text-xl">
                            <i class="fa-solid fa-star cursor-pointer {{ $this->getAverage() > 0 ? 'text-yellow-500' : 'text-white/50' }}"
                                wire:click="rating(1)"></i>
                            <i class="fa-solid fa-star cursor-pointer {{ $this->getAverage() > 1 ? 'text-yellow-500' : 'text-white/50' }}"
                                wire:click="rating(2)"></i>
                            <i class="fa-solid fa-star cursor-pointer {{ $this->getAverage() > 2 ? 'text-yellow-500' : 'text-white/50' }}"
                                wire:click="rating(3)"></i>
                            <i class="fa-solid fa-star cursor-pointer {{ $this->getAverage() > 3 ? 'text-yellow-500' : 'text-white/50' }}"
                                wire:click="rating(4)"></i>
                            <i class="fa-solid fa-star cursor-pointer {{ $this->getAverage() > 4 ? 'text-yellow-500' : 'text-white/50' }}"
                                wire:click="rating(5)"></i>
                            <p class="text-base">
                                Đánh giá: {{ $this->getAverage() }}/5 sao từ {{ $book->ratings->count() }} lượt đánh
                                giá. <span>
                                    @if (!Auth::check())
                                        Để đánh giá vui lòng đăng nhập
                                    @else
                                        @if (count($myRating) > 0)
                                            <span>Bạn đã đánh giá {{ $myRating[0]->rating }} sao cho cuốn sách
                                                này</span>
                                        @else
                                            <span>
                                                Đánh giá sách bằng cách bấm vào các ngôi sao
                                            </span>
                                        @endif
                                    @endif
                                </span>
                            </p>
                        </div>
                        <p class="py-2">Thể loại: {{ $book->categories[0]->name }}</p>
                        <div class="grid grid-cols-2 md:grid-cols-4 grid-flow-row gap-6 pt-3">
                            <div class="inline-block border-e border-white/75 pe-6">
                                <h4>Số chương</h4>
                                <i class="fa-solid fa-book-open"></i>
                                <span class="ms-2 font-medium">{{ $totalChaps }}</span>
                            </div>
                            <div class="inline-block  md:border-e border-white/75 pe-6">
                                <h4>Lượt đọc</h4>
                                <i class="fa-solid fa-eye"></i>
                                <span class="ms-2 font-medium">{{ $book->read_count }}</span>
                            </div>
                            <div class="inline-block border-e border-white/75 pe-6">
                                <h4>Đánh dấu</h4>
                                <i class="fa-solid fa-bookmark"></i>
                                <span class="ms-2 font-medium">{{ $book->bookmarks->count() }}</span>
                            </div>
                            <div class="inline-block">
                                <h4>Nguồn</h4>
                                <i class="fa-solid fa-book-open"></i>
                                <span class="font-medium">
                                    Diễn đàn sách đỉnh cao
                                </span>
                            </div>
                        </div>
                        @if (!Auth::check())
                            <div>
                                <div class="bg-white/20 inline-block px-4 py-1 rounded-full">
                                    <p>Bạn cần phải đăng nhập để có thể đọc sách và đánh dấu sách</p>
                                </div>
                            </div>
                        @endif
                        <div class="flex gap-3 pt-4">


                            @if ($chapFirst)
                                <a href="
                                {{ route('book.chap', [basename(Request::path()), $chapFirst->slug . '-' . $chapFirst->id]) }}
                                "
                                    class="inline-block bg-primary text-white px-8 py-2 rounded-lg text-xl shadow-lg hover:opacity-90">
                                    Đọc ngay
                                </a>
                            @endif
                            @if (!$isHasBookmark)
                                <a href="javascript:void(0)" wire:click="bookmark"
                                    class="inline-block bg-primary text-white px-8 py-2 rounded-lg text-xl shadow-lg hover:opacity-90">
                                    Đánh dấu
                                </a>
                            @endif

                            @if (Auth::check() && $isHasBookmark)
                                <a href="javascript:void(0)" wire:click="deleteBookmark"
                                    class="inline-block bg-primary text-white px-8 py-2 rounded-lg text-xl shadow-lg hover:opacity-90">
                                    Huỷ đánh dấu
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--  --}}
        <div class="max-w-screen-lg mx-auto pt-24 px-4 lg:px-0">
            <h2 class="text-xl font-bold border-b">Giới thiệu sách</h2>
            {{-- <p>{{ $book->description }}</p> --}}
            <div class="markdown-content">
                <x-markdown>
                    {{ $book->description }}
                </x-markdown>
            </div>
        </div>
        {{-- chuong --}}
        <div class="max-w-screen-lg mx-auto pt-8 px-4 lg:px-0">
            <h2 class="text-xl font-bold border-b mb-6">Chương</h2>

            <ul
                class="grid grid-cols-1 md:grid-cols-2 grid-flow-row gap-x-5 md:[&>*:nth-child(4n+4)]:bg-black/5 md:[&>*:nth-child(4n+3)]:bg-black/5">
                @foreach ($chaps as $chap)
                    <li class="border-b border-gray-200 hover:bg-black/10">
                        <a href="
                        {{ route('book.chap', [basename(Request::path()), $chap->slug . '-' . $chap->id]) }}
                        "
                            class="inline-block py-4 w-full">
                            {{ $chap->name }}
                        </a>
                    </li>
                @endforeach
            </ul>


            <div class="text-center pt-10">

                <livewire:components.pagination :currentPage="$page" :totalPage="$totalPages" />

            </div>

            <div class="pt-24 px-0 ">
                <livewire:components.comments :book="$book" :comments="$comments" />
            </div>
        </div>
    </div>

    @if ($isShowNoti)
        <livewire:components.noti-rating :isShow="$isShowNoti" />
    @endif

</div>
