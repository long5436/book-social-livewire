<div class="pb-10">
    <h2 class="font-medium text-2xl pb-4">
        Bình luận
    </h2>

    <div class="flex gap-4">
        <textarea class="flex-1 bg-white border border-black/10 rounded-md outline-none px-3 py-2 h-12"
            placeholder="Nội dung bình luận" wire:model="content"></textarea>

        @if (Auth::check())
            <div>
                <button class="bg-primary text-white px-3 py-2 rounded-md hover:opacity-90" wire:click="btnComment">
                    Bình luận
                </button>
            </div>
        @endif
    </div>
    @if (!Auth::check())
        <p class="text-green-600">Đăng nhập để có thể bình luận</p>
    @endif
    <div class="pt-5">
        <h3 class="text-primary border-b border-primary/50 mb-4">
            Mới nhất
        </h3>

        <div>
            @foreach ($comments->reverse() as $index => $item)
                @php
                    $user = $item
                        ->user()
                        ->select('id', 'name', 'email')
                        ->first();
                @endphp

                <div class="flex gap-3 pb-1">
                    <div class="w-10 h-10 rounded-full overflow-hidden border border-black/10">
                        <img class="w-fit h-fit" src="{{ asset('images/avt.jpg') }}" alt="">
                    </div>
                    <div class="flex-1">
                        <a href="#" class="font-medium hover:text-primary hover:underline">
                            @if ($user)
                                <h4>{{ $user->name }}</h4>
                            @endif
                        </a>

                        <div>
                            <p>{{ $item->content }}</p>
                        </div>
                        <div class="pb-2 pt-1 relative">
                            <div class="relative inline-block comment-react">
                                <button class="relative inline-block text-black/60 hover:text-primary/80">
                                    <i class="fa-solid fa-thumbs-up"></i>
                                    <span>Thích</span>
                                </button>

                                <div
                                    class="hidden absolute -top-9 items-end gap-2 bg-white border border-black/10 z-30 py-1 px-1 rounded-full shadow-md transition-all">
                                    <button class="w-9 h-9 hover:w-12 hover:h-12 transition-all"
                                        wire:click="btnLike({{ $item->id }}, 'like', {{ $index }})">
                                        <img class="w-fit h-fit" src="{{ asset('images/like-icon.svg') }}"
                                            alt="">
                                    </button>
                                    <button class="w-9 h-9 hover:w-12 hover:h-12 transition-all"
                                        wire:click="btnLike({{ $item->id }}, 'haha', {{ $index }})">
                                        <img class="w-fit h-fit" src="{{ asset('images/haha-icon.svg') }}"
                                            alt="">
                                    </button>
                                    <button class="w-9 h-9 hover:w-12 hover:h-12 transition-all"
                                        wire:click="btnLike({{ $item->id }}, 'surprise', {{ $index }})">
                                        <img class="w-fit h-fit" src="{{ asset('images/surprise-icon.svg') }}"
                                            alt="">
                                    </button>
                                    <button class="w-9 h-9 hover:w-12 hover:h-12 transition-all"
                                        wire:click="btnLike({{ $item->id }}, 'angry', {{ $index }})">
                                        <img class="w-fit h-fit" src="{{ asset('images/angry-icon.svg') }}"
                                            alt="">
                                    </button>
                                </div>
                            </div>
                            <div class="inline-block ps-2 text-black/60 hover:text-primary/80">
                                @if (!$item->like)
                                    0
                                @else
                                    @php
                                        $like = json_decode($item->like);
                                        $total = $like->like + $like->haha + $like->surprise + $like->angry;
                                        
                                        $mapArr = json_decode($item->like, true);
                                        arsort($mapArr);
                                        // dd($mapArr);
                                    @endphp

                                    {{ $total }}


                                    <div class="inline-block block-comment-react">
                                        @foreach ($mapArr as $key => $reactItem)
                                            @if ($reactItem > 0)
                                                <img class="w-5 h-5  inline-block"
                                                    src="{{ asset('images/' . $key . '-icon.svg') }}" />
                                            @endif
                                        @endforeach


                                        {{-- <img class="w-5 h-5  inline-block border border-black/10 rounded-full"
                                            src="{{ asset('images/like-icon.svg') }}" />
                                        <img class="w-5 h-5  inline-block border border-black/10 rounded-full"
                                            src="{{ asset('images/haha-icon.svg') }}" />
                                        <img class="w-5 h-5  inline-block border border-black/10 rounded-full"
                                            src="{{ asset('images/surprise-icon.svg') }}" />
                                        <img class="w-5 h-5  inline-block border border-black/10 rounded-full"
                                            src="{{ asset('images/angry-icon.svg') }}" /> --}}
                                    </div>
                                @endif
                            </div>

                            <button class="inline-block ps-6 text-black/60 hover:text-primary/80 book-comment-btn">
                                <i class="fa-solid fa-reply"></i>
                                <span>Trả lời</span>
                            </button>

                            @if (Auth::check())
                                @if (Auth::user()->id == $item->user_id)
                                    <button class="inline-block ps-6 text-black/60 hover:text-primary/80"
                                        wire:click="btnDelete({{ $item->id }}, {{ $index }})">
                                        <i class="fa-solid fa-trash"></i>
                                        <span>Xoá</span>
                                    </button>
                                @endif
                            @endif

                            <div class="inline-block ps-6 text-black/60 hover:text-primary/80">

                                @php
                                    $timeAgoResult = $this->timeAgo($item);
                                    // dd($timeAgoResult);
                                @endphp

                                <span>{{ $timeAgoResult }}</span>
                            </div>
                        </div>

                        {{-- khong xoa xung dot css cho nay --}}
                        <div class="flex hidden gap-4 book-comment-block">
                            <textarea class="flex-1 bg-white border border-black/10 rounded-md outline-none px-3 py-2 h-12"
                                placeholder="Nội dung bình luận" wire:model="contentRep"></textarea>

                            @if (Auth::check())
                                <div>
                                    <button class="bg-primary text-white px-3 py-2 rounded-md hover:opacity-90"
                                        wire:click="btnComment({{ $item->id }})">
                                        Trả lời
                                    </button>
                                </div>
                            @endif
                        </div>

                        {{-- doan nay co nhieu loi --}}
                        {{-- start sub --}}
                        <div>
                            @if ($item->sub)
                                @foreach ($item->sub->reverse() as $index => $item)
                                    @php
                                        $user = $item
                                            ->user()
                                            ->select('id', 'name', 'email')
                                            ->first();
                                    @endphp

                                    <div class="flex gap-3 pb-1">
                                        <div class="w-10 h-10 rounded-full overflow-hidden border border-black/10">
                                            <img class="w-fit h-fit" src="{{ asset('images/avt.jpg') }}"
                                                alt="">
                                        </div>
                                        <div class="flex-1">
                                            <a href="#" class="font-medium hover:text-primary hover:underline">
                                                @if ($user)
                                                    <h4>{{ $user->name }}</h4>
                                                @endif
                                            </a>

                                            <div>
                                                <p>{{ $item->content }}</p>
                                            </div>
                                            <div class="pb-2 pt-1 relative">
                                                <div class="relative inline-block comment-react">
                                                    <button
                                                        class="relative inline-block text-black/60 hover:text-primary/80">
                                                        <i class="fa-solid fa-thumbs-up"></i>
                                                        <span>Thích</span>
                                                    </button>

                                                    <div
                                                        class="hidden absolute -top-9 items-end gap-2 bg-white border border-black/10 z-30 py-1 px-1 rounded-full shadow-md transition-all">
                                                        <button class="w-9 h-9 hover:w-12 hover:h-12 transition-all"
                                                            wire:click="btnLike({{ $item->id }}, 'like', {{ $index }})">
                                                            <img class="w-fit h-fit"
                                                                src="{{ asset('images/like-icon.svg') }}"
                                                                alt="">
                                                        </button>
                                                        <button class="w-9 h-9 hover:w-12 hover:h-12 transition-all"
                                                            wire:click="btnLike({{ $item->id }}, 'haha', {{ $index }})">
                                                            <img class="w-fit h-fit"
                                                                src="{{ asset('images/haha-icon.svg') }}"
                                                                alt="">
                                                        </button>
                                                        <button class="w-9 h-9 hover:w-12 hover:h-12 transition-all"
                                                            wire:click="btnLike({{ $item->id }}, 'surprise', {{ $index }})">
                                                            <img class="w-fit h-fit"
                                                                src="{{ asset('images/surprise-icon.svg') }}"
                                                                alt="">
                                                        </button>
                                                        <button class="w-9 h-9 hover:w-12 hover:h-12 transition-all"
                                                            wire:click="btnLike({{ $item->id }}, 'angry', {{ $index }})">
                                                            <img class="w-fit h-fit"
                                                                src="{{ asset('images/angry-icon.svg') }}"
                                                                alt="">
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="inline-block ps-2 text-black/60 hover:text-primary/80">
                                                    @if (!$item->like)
                                                        0
                                                    @else
                                                        @php
                                                            $like = json_decode($item->like);
                                                            $total = $like->like + $like->haha + $like->surprise + $like->angry;
                                                            
                                                            $mapArr = json_decode($item->like, true);
                                                            arsort($mapArr);
                                                            // dd($mapArr);
                                                        @endphp

                                                        {{ $total }}


                                                        <div class="inline-block block-comment-react">
                                                            @foreach ($mapArr as $key => $reactItem)
                                                                @if ($reactItem > 0)
                                                                    <img class="w-5 h-5  inline-block"
                                                                        src="{{ asset('images/' . $key . '-icon.svg') }}" />
                                                                @endif
                                                            @endforeach


                                                            {{-- <img class="w-5 h-5  inline-block border border-black/10 rounded-full"
                                                        src="{{ asset('images/like-icon.svg') }}" />
                                                    <img class="w-5 h-5  inline-block border border-black/10 rounded-full"
                                                        src="{{ asset('images/haha-icon.svg') }}" />
                                                    <img class="w-5 h-5  inline-block border border-black/10 rounded-full"
                                                        src="{{ asset('images/surprise-icon.svg') }}" />
                                                    <img class="w-5 h-5  inline-block border border-black/10 rounded-full"
                                                        src="{{ asset('images/angry-icon.svg') }}" /> --}}
                                                        </div>
                                                    @endif
                                                </div>

                                                <button
                                                    class="inline-block ps-6 text-black/60 hover:text-primary/80 book-comment-btn">
                                                    <i class="fa-solid fa-reply"></i>
                                                    <span>Trả lời</span>
                                                </button>

                                                @if (Auth::check())
                                                    @if (Auth::user()->id == $item->user_id)
                                                        <button
                                                            class="inline-block ps-6 text-black/60 hover:text-primary/80"
                                                            wire:click="btnDelete({{ $item->id }}, {{ $index }})">
                                                            <i class="fa-solid fa-trash"></i>
                                                            <span>Xoá</span>
                                                        </button>
                                                    @endif
                                                @endif

                                                <div class="inline-block ps-6 text-black/60 hover:text-primary/80">

                                                    @php
                                                        $timeAgoResult = $this->timeAgo($item);
                                                        // dd($timeAgoResult);
                                                    @endphp

                                                    <span>{{ $timeAgoResult }}</span>
                                                </div>
                                            </div>

                                            {{-- khong xoa xung dot css cho nay --}}
                                            <div class="flex hidden gap-4 book-comment-block">
                                                <textarea class="flex-1 bg-white border border-black/10 rounded-md outline-none px-3 py-2 h-12"
                                                    placeholder="Nội dung bình luận" wire:model="contentRep"></textarea>

                                                @if (Auth::check())
                                                    <div>
                                                        <button
                                                            class="bg-primary text-white px-3 py-2 rounded-md hover:opacity-90"
                                                            wire:click="btnComment({{ $item->id }})">
                                                            Trả lời
                                                        </button>
                                                    </div>
                                                @endif
                                            </div>

                                            @php
                                                $cmtCount = $this->getSubCommentCount($item->id);
                                            @endphp

                                            @if ($cmtCount > 0)
                                                <div>
                                                    <button class="text-black/60 hover:text-primary/80"
                                                        wire:click='loadSubComments({{ $item->id }}, {{ $index }})'>
                                                        <i class="fa-solid fa-arrow-turn-up rotate-90"></i>
                                                        <span>

                                                            {{ $cmtCount }}

                                                            Trả lời</span>
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        {{-- end sub --}}

                        @php
                            $cmtCount = $this->getSubCommentCount($item->id);
                        @endphp

                        @if ($cmtCount > 0)
                            <div>
                                <button class="text-black/60 hover:text-primary/80"
                                    wire:click='loadSubComments({{ $item->id }}, {{ $index }})'>
                                    <i class="fa-solid fa-arrow-turn-up rotate-90"></i>
                                    <span>

                                        {{ $cmtCount }}

                                        Trả lời</span>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
