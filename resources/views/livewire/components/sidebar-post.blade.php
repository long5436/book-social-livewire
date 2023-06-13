<div class="px-2 py-2 ms-10">
    <h2 class="text-xl font-semibold border-b border-gray-300 mb-6">
        Bài viết
    </h2>
    <ul>

        @foreach ($posts as $post)
            @php
                $user = $post->user;
                $book = $post->book;
                // dd($user);
            @endphp

            <li>
                <div class="flex mb-3 border-b pb-2">
                    <div class="pe-2 pt-1">
                        @if ($user->photo)
                            <img src="{{ asset('imgs/user/' . $user->photo) }}"
                                class="w-8 h-8 rounded-full inline-block border" alt="avata"
                                onerror="this.src='{{ asset('images/user_no_img.jpg') }}'">
                        @else
                            <i
                                class="fa-solid fa-user w-8 h-8 rounded-full text-center leading-8 bg-gray-100 text-gray-400 border"></i>
                        @endif
                    </div>
                    <div>
                        <a href="{{ route('post.view', $post->slug . '-' . $post->id) }}">
                            <h2 class="font-semibold text-black/80 hover:underline hover:text-primary">
                                {{ $post->name }}</h2>
                            <p class="opacity-60 text-sm">{{ $this->timeAgo($post) }}</p>
                            <p class="opacity-60 text-sm">{{ $book->name }}</p>
                        </a>
                    </div>
                </div>
            </li>
        @endforeach

    </ul>
</div>
