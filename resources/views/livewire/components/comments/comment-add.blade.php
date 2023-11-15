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
