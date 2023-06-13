<div class="container w-full mx-auto pt-20">
    <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">
        <h1 class="font-medium text-2xl">Chỉnh sửa chap</h1>

        <div class="py-3">
            <button type="button" wire:click="updChap"
                class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                Lưu
            </button>

            <a href="{{ route('admin.book.chap.add', $chap->book_id) }}"
                class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                Chap mơi
            </a>

        </div>
        <div>
            <livewire:components.chap-control-admin :chap="$chap" />
        </div>
        <div>

            <div class="pb-4">
                <label for="">Tên chap</label>
                <input type="text" placeholder="Ten chap"
                    class="w-full border border-primary/30 outline-primary p-1 px-3 rounded-md" wire:model="chapName">
            </div>

            <div class="pb-4" wire:ignore>

                <textarea id="description">{{ $content }}</textarea>
                {{-- <livewire:components.editor wire:model="content" /> --}}
            </div>


        </div>

        <div>
            <livewire:components.chap-control-admin :chap="$chap" />
        </div>
    </div>

    <script>
        var simplemde = new SimpleMDE({
            element: document.getElementById("description"),

        });

        simplemde.codemirror.on("change", function() {
            @this.set('content', simplemde.value(), true)
        });
    </script>
</div>
