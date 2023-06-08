<div class="bg-white w-screen h-screen bg-cover">
    <div class="w-full h-full flex items-center justify-center text-gray-600">
        <form class="py-4 px-4 rounded-2xl  w-96 max-w-full">
            <div class="pb-5">
                <h1 class="font-medium text-2xl">Đăng nhập Admin</h1>
            </div>
            <div class="pb-4">
                <label for="email" class="block font-medium mb-1">
                    Tên tài khoản/Email
                </label>
                <input wire:model="email" wire:click="inputClick" type="text" id="email"
                    placeholder="Tên tài khoản/Email"
                    class="bg-transparent border-2 border-black/20 rounded-lg px-3 py-2  w-full outline-none focus:border-primary ">
            </div>
            <div class="pb-4">
                <label for="pass" class="block font-medium mb-1">
                    Mật khẩu
                </label>
                <input wire:model="password" wire:click="inputClick" type="text" id="pass"
                    placeholder="Mật khẩu"
                    class="bg-transparent border-2 border-black/20 rounded-lg px-3 py-2  w-full outline-none focus:border-primary ">
            </div>
            @if ($showNoti)
                <div class="">
                    <p class="text-red-500">Đăng nhập không thành công! tài khoản hoặc mật khẩu không chính xác</p>
                </div>
            @endif
            <div class="pt-4">
                <button wire:click="btnClick" type="button"
                    class="bg-primary text-white w-full rounded-lg leading-10 opacity-70 hover:opacity-100 disabled:opacity-40"
                    {{-- {{ $btnDisable ? 'disabled' : '' }} --}}>
                    Đăng nhập
                </button>
            </div>
        </form>
    </div>
</div>
