<div class="bg-white w-screen h-screen bg-cover">
    <livewire:components.meta />

    <div class="w-full h-full flex items-center justify-center text-gray-600">
        <form class="py-4 px-4 rounded-2xl  w-96 max-w-full">
            <div class="pb-5">
                <h1 class="font-medium text-2xl">Đăng nhập User</h1>
            </div>

            <div class="pb-4">
                <label for="pass" class="block font-medium mb-1">
                    Mật khẩu cũ
                </label>
                <input wire:model="password" wire:click="inputClick" type="password" placeholder="Mật khẩu cũ"
                    class="bg-transparent border-2 border-black/20 rounded-lg px-3 py-2  w-full outline-none focus:border-primary ">
            </div>

            <div class="pb-4">
                <label for="pass" class="block font-medium mb-1">
                    Mật khẩu mới
                </label>
                <input wire:model="newPass" wire:click="inputClick" type="password" placeholder=" Mật khẩu mới"
                    class="bg-transparent border-2 border-black/20 rounded-lg px-3 py-2  w-full outline-none focus:border-primary ">
            </div>

            <div class="pb-4">
                <label for="pass" class="block font-medium mb-1">
                    Nhập lại mật khẩu mới
                </label>
                <input wire:model="reNewPass" wire:click="inputClick" type="password"
                    placeholder="Nhập lại mật khẩu mới"
                    class="bg-transparent border-2 border-black/20 rounded-lg px-3 py-2  w-full outline-none focus:border-primary ">
            </div>

            <div>
                @error('reNewPass')
                    <span class="error text-red-500">"Mật khẩu nhập lại không khớp"</span>
                @enderror
            </div>
            @if ($showNoti)
                <div class="">
                    <p class="text-red-500">Mật khẩu cũ không chính xác</p>
                </div>
            @endif
            <div class="py-4">
                <button wire:click="btnClick" type="button"
                    class="bg-primary text-white w-full rounded-lg leading-10 opacity-70 hover:opacity-100 disabled:opacity-40"
                    {{-- {{ $btnDisable ? 'disabled' : '' }} --}}>
                    Thay đổi mật khẩu
                </button>
            </div>
        </form>
    </div>
</div>
