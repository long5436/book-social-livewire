<div class="container w-full mx-auto pt-20">
    <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">
        <h1 class="font-medium text-2xl">Tạo sách mới</h1>

        <div class="py-3">
            <button type="button" wire:click="updBook"
                class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                Lưu
            </button>

            {{-- @if ($startChapId)
                <a href="{{ route('admin.book.chap.edit', $startChapId) }}" type="button"
                    class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                    Chuyển đến chap
                </a>
            @else
                <a href="{{}}" type="button"
                    class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                    Tạo chap mới
                </a> --}}
            {{-- @endif --}}
        </div>

        <div>
            <div class="pb-4">
                <label for="">Tên</label>
                <input type="text" placeholder="Tên sách"
                    class="w-full border border-primary/30 outline-primary p-1 px-3 rounded-md" wire:model="name">
            </div>

            <div class="pb-4">
                <label for="">Thể loại</label>
                <select name="" id="" wire:model="selectedValue"
                    class="w-full border border-primary/30 outline-primary p-1 px-3 rounded-md">
                    @foreach ($cates as $index => $item)
                        <option value="{{ $index }}" @if ($item->id == $selectedValue) @selected(true) @endif>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex gap-5 items-center">
                @if ($photoName)
                    <img class='aspect-[2/2.8] w-40 rounded-md border' src="{{ asset('imgs/books/' . $photoName) }}"
                        alt="avata" onerror="this.src='{{ asset('images/user_no_img.jpg') }}'">
                @endif

                @if ($tempPhoto)
                    <img class='aspect-[2/2.8] w-40 rounded-md border' src="{{ $tempPhoto }}" alt="avata">
                @endif
                <form class="flex items-center justify-center w-40 h-40" enctype="multipart/form-data">
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center aspect-[2/2.8] w-40 border-2 border-gray-300 border-dashed rounded-md cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">

                            {{-- <i class="fa-regular fa-image text-current"></i> --}}
                            <svg aria-hidden="true" class="w-20 h-20 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                </path>
                            </svg>

                        </div>
                        <input id="dropzone-file" type="file" class="hidden" wire:model="photo" />
                    </label>
                </form>

            </div>

            <div class="pb-4">
                <label for="">Giá (để trống là miễn phí)</label>
                <input type="text" placeholder="Giá sách"
                    class="w-full border border-primary/30 outline-primary p-1 px-3 rounded-md" wire:model="price">
            </div>

            <div class="pb-4" wire:ignore>
                <label for="">Giới thiệu</label>
                <textarea id="description">{{ $desc }}</textarea>
                {{-- <livewire:components.editor wire:model="content" /> --}}
            </div>


        </div>
    </div>

    <script>
        var simplemde = new SimpleMDE({
            element: document.getElementById("description"),

        });

        simplemde.codemirror.on("change", function() {
            @this.set('desc', simplemde.value(), true)
        });
    </script>
</div>
