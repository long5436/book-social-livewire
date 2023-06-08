<div class="bg-white w-screen h-screen bg-cover">
    <div class="w-full h-full flex items-center justify-center text-gray-600">
        <form class="py-4 px-4 rounded-2xl  w-96 max-w-full">
            <div class="pb-5">
                <h1 class="font-medium text-2xl">Đăng nhập User</h1>
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
            <div class="pb-4">
                <input wire:model="remember" type="checkbox"
                    class="mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-neutral-600 dark:checked:border-primary dark:checked:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]">
                <span>Ghi nhớ đăng nhập</span>
            </div>
            @if ($showNoti)
                <div class="">
                    <p class="text-red-500">Đăng nhập không thành công! tài khoản hoặc mật khẩu không chính xác</p>
                </div>
            @endif
            <div class="py-4">
                <button wire:click="btnClick" type="button"
                    class="bg-primary text-white w-full rounded-lg leading-10 opacity-70 hover:opacity-100 disabled:opacity-40"
                    {{-- {{ $btnDisable ? 'disabled' : '' }} --}}>
                    Đăng nhập
                </button>
            </div>
            <div>
                <a href="{{ route('register') }}" class="font-medium hover:text-primary">Chưa có tài khoản? Đăng ký
                    ngay</a>
            </div>
        </form>
    </div>
</div>
