<div>

    <form wire:submit.prevent="submit" class="max-w-xl mx-auto">

        <div class="mb-4">
            <label for="content" class="block font-bold mb-2">Bài Viết</label>
                <textarea wire:model="content" id="content" class="w-full p-2 border border-gray-300 rounded"></textarea>
                @error('content') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Đăng bài</button>
    </form>
</div>
