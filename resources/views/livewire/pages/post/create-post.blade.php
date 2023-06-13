<div>
    <livewire:components.meta />

    <div class="max-w-screen-lg mx-auto px-4 md:px-8 xl:px-0 pt-8">

        <div>
            <h1 class="text-3xl font-medium text-primary">Tạo bài viết mới</h1>
        </div>

        <div class="py-3">
            <input type="text" placeholder="Tên bài viết" class="text-2xl w-full outline-none bg-transparent"
                wire:model="name">
        </div>

        <div class="py-4">
            <label for="">Chọn sách cho bài viết (bắt buộc)</label>
            <div class="relative">

                @if ($books)

                    <div class="absolute bg-white border border-primary/50 top-8 shadow rounded-md p-3 z-10">

                        @foreach ($books as $item)
                            <div class="border-b cursor-pointer hover:bg-primary/20 py-2"
                                wire:click="selectBook({{ $item }})">
                                {{ $item->name }}
                            </div>
                        @endforeach

                    </div>

                @endif
                <div class="flex gap-2 items-center">

                    @if ($bookSelected)
                        <div class="w-52 bg-primary/40 rounded-md p-1 border border-black/10">
                            {{ $bookSelected['name'] }}
                        </div>

                        <button class="bg-primary py-1 px-2 rounded-md text-white hover:bg-primary/80"
                            wire:click="resetSelect">
                            Chọn lại
                        </button>
                    @else
                        <input type="text" placeholder="Nhập tên sách"
                            class="border-none outline-none bg-transparent" wire:model="search">
                    @endif
                </div>
            </div>
        </div>
        {{-- <button wire:click="test">dsad</button> --}}
        <div wire:ignore>
            <label for="MyID">Nội dung bài viết</label>
            <textarea id="MyID" wire:model="content"></textarea>
            {{-- <livewire:components.editor wire:model="content" /> --}}
        </div>

        <div class="py-5 mt-5 border-t border-black/10">
            <button wire:click="btnClick"
                class="inline-block bg-primary text-white px-8 py-2 rounded-lg text-xl hover:opacity-90">
                Đăng bài
            </button>
        </div>
    </div>
    <script>
        var simplemde = new SimpleMDE({
            element: document.getElementById("MyID"),
            // autosave: {
            //     enabled: true,
            //     uniqueId: "MyUniqueID",
            //     delay: 1000,
            // },
        });

        simplemde.codemirror.on("change", function() {
            @this.set('content', simplemde.value(), true)
        });
    </script>

</div>
