<div class="flex justify-center items-center h-screen">
    <livewire:components.meta />
    <div class="w-96">
        <form wire:submit.prevent="updateProfile" class="bg-white rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4 flex items-center">
                <label for="name" class="block text-gray-700 text-sm font-bold mr-2">Tên</label>
                <input type="name" id="name" wire:model="name"
                    class="bg-transparent border-2 border-black/20 rounded-lg px-3 py-2  w-full outline-none focus:border-primary">
            </div>

            <div class="mb-4 flex items-center">
                <label for="email" class="block text-gray-700 text-sm font-bold mr-2">Email</label>
                <input type="email" wire:model="email"
                    class="bg-transparent border-2 border-black/20 rounded-lg px-3 py-2  w-full outline-none focus:border-primary">
            </div>

            <div class="mb-4 flex items-center">
                <label for="avatar" class="block text-gray-700 text-sm font-bold mr-2">Hình ảnh</label>
                <input type="file" id="avatar" wire:model="avatar"
                    class="bg-transparent border-2 border-black/20 rounded-lg px-3 py-2  w-full outline-none focus:border-primary">
                @error('avatar')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class=" mb-4">Thời gian tham gia: {{ $joinedTime }}</div>

            <div class="flex items-center justify-between">
                <button type="button"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:border-primary"
                    onclick="window.location.href='/'">
                    Thoát
                </button>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:border-primary">
                    Lưu
                </button>
            </div>
        </form>
        @if (session()->has('message'))
            <div>{{ session('message') }}</div>
        @endif
    </div>
</div>
