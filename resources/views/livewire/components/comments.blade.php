<div class="pb-10">
    <h2 class="font-medium text-2xl pb-4">
        Bình luận
    </h2>

    {{-- <div class="flex gap-4">
        <textarea class="flex-1 bg-white border border-black/10 rounded-md outline-none px-3 py-2 h-12"
            placeholder="Nội dung bình luận" wire:model="content"></textarea>

        @if (Auth::check())
            <div>
                <button class="bg-primary text-white px-3 py-2 rounded-md hover:opacity-90" wire:click="btnComment(null)">
                    Bình luận
                </button>
            </div>
        @endif
    </div> --}}

    <livewire:components.comments.comment-add :book="$book" />

    @if (!Auth::check())
        <p class="text-green-600">Đăng nhập để có thể bình luận</p>
    @endif
    <div class="pt-5">
        <h3 class="text-primary border-b border-primary/50 mb-4">
            Mới nhất
        </h3>

        <div>

            @foreach ($comments->reverse() as $index => $item)
                <livewire:components.comments.comment-item :commentItem="$item" :wire:key="'item-'.$item->id" />
            @endforeach
        </div>
    </div>
</div>
