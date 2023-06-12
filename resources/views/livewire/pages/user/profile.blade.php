<div class="max-w-screen-xl mx-auto md:px-8 xl:px-0 pt-8 relative">

    <div class="max-w-screen-lg mx-auto pt-2 px-6">

        <div class="px-4 md:px-0">
            <h1 class="font-medium text-3xl py-4">Trang cá nhân</h1>

            <div class="py-2">
                <h2 class="py-2">Màu sắc chủ đạo</h2>
                <div class="flex gap-3">
                    <div class="flex flex-col items-center w-20">
                        <button class="w-9 h-9 rounded-full border-2 hover:border-black/20" wire:click="selectColor('')">
                            @if (!$primaryColor)
                                <i class="fa-solid fa-check text-xl text-black/80"></i>
                            @endif
                        </button>
                        <span class="opacity-60 text-sm">
                            Mặc định
                        </span>
                    </div>
                    <div class="flex flex-col items-center w-20">
                        <button
                            class="w-9 h-9 bg-green-500 rounded-full border-2 border-green-500 hover:border-black/20"
                            wire:click="selectColor('34 197 94')">
                            @if ($primaryColor == '34 197 94')
                                <i class="fa-solid fa-check text-xl text-white"></i>
                            @endif
                        </button>
                        <span class="opacity-60 text-sm">
                            Xanh lá
                        </span>
                    </div>
                    <div class="flex flex-col items-center w-20">
                        <button class="w-9 h-9 bg-blue-400 rounded-full border-2 border-blue-400 hover:border-black/20"
                            wire:click="selectColor('96 165 250')">
                            @if ($primaryColor == '96 165 250')
                                <i class="fa-solid fa-check text-xl text-white"></i>
                            @endif
                        </button>
                        <span class="opacity-60 text-sm">
                            Xanh lam
                        </span>
                    </div>
                    <div class="flex flex-col items-center w-20">
                        <button class="w-9 h-9 bg-pink-400 rounded-full border-2 border-pink-400 hover:border-black/20"
                            wire:click="selectColor('244 114 182')">
                            @if ($primaryColor == '244 114 182')
                                <i class="fa-solid fa-check text-xl text-white"></i>
                            @endif
                        </button>
                        <span class="opacity-60 text-sm">
                            Hồng
                        </span>
                    </div>
                    <div class="flex flex-col items-center w-20">
                        <button
                            class="w-9 h-9 bg-orange-400 rounded-full border-2 border-orange-400 hover:border-black/20"
                            wire:click="selectColor('251 146 60')">
                            @if ($primaryColor == '251 146 60')
                                <i class="fa-solid fa-check text-xl text-white"></i>
                            @endif
                        </button>
                        <span class="opacity-60 text-sm">
                            Cam
                        </span>
                    </div>
                </div>
            </div>

            <div class="py-2">
                <h2 class="py-2">Ảnh đại diện</h2>
                <div class="flex gap-5">
                    @if ($photoName)
                        <img class='w-40 h-40 rounded-full border' src="{{ asset('imgs/user/' . $photoName) }}"
                            alt="avata" onerror="this.src='{{ asset('images/user_no_img.jpg') }}'">
                    @endif

                    @if ($tempPhoto)
                        <img class='w-40 h-40 rounded-full border' src="{{ $tempPhoto }}" alt="avata">
                    @endif
                    <form class="flex items-center justify-center w-40 h-40" enctype="multipart/form-data">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-full border-2 border-gray-300 border-dashed rounded-full cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">

                                {{-- <i class="fa-regular fa-image text-current"></i> --}}
                                <svg aria-hidden="true" class="w-20 h-20 text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>

                            </div>
                            <input id="dropzone-file" type="file" class="hidden" wire:model="photo" />
                        </label>
                    </form>

                </div>
            </div>

            <div class="py-2">
                <h2 class="py-2">Tên hiển thị</h2>
                <input type="text" class="w-full text-xl bg-transparent border-none outline-primary"
                    placeholder="Tên hiển thị" value="{{ Auth::user()->name }}" wire:model="name">
            </div>

            <div class="py-2">
                <h2 class="py-2">Email</h2>
                <input type="text" class="w-full text-xl bg-transparent border-none outline-primary"
                    placeholder="Email" value="{{ Auth::user()->email }}" wire:model="email">
            </div>

            <div class="py-5 mt-5 border-t border-black/10">
                <button wire:click="toggleShowPassVerify"
                    class="inline-block bg-primary text-white px-8 py-2 rounded-lg text-xl hover:opacity-90">
                    Lưu thay đổi
                </button>

                <a href="{{ route('user.changepass') }}"
                    class="inline-block bg-primary text-white px-8 py-2 rounded-lg text-xl hover:opacity-90 ms-5">
                    Đổi mật khẩu
                </a>
            </div>
        </div>
    </div>

    @if ($showVerifyPass)


        <div class="fixed inset-0 z-50 bg-black/20 backdrop-blur flex">
            <form class="py-4 px-4 rounded-2xl  w-96 max-w-full bg-white m-auto">
                <div class="pb-4">
                    <label for="pass" class="block font-medium mb-1">
                        Nhập mật khẩu để xác nhận
                    </label>
                    <input wire:model="pass" wire:click="inputClick" type="password" id="pass"
                        placeholder="Nhập mật khẩu"
                        class="bg-transparent border-2 border-black/20 rounded-lg px-3 py-2  w-full outline-none focus:border-primary ">
                </div>

                @if ($showNoti)
                    <div class="">
                        <p class="text-red-500">Lưu không thành công! tài khoản hoặc mật khẩu không chính xác</p>
                    </div>
                @endif
                <div class="pt-4 flex gap-2">
                    <button type="button" wire:click="toggleShowPassVerify"
                        class="bg-primary text-white w-full rounded-lg leading-10 opacity-70 hover:opacity-100 disabled:opacity-40">
                        Huỷ
                    </button>
                    <button type="button" wire:click="btnSavePup"
                        class="bg-primary text-white w-full rounded-lg leading-10 opacity-70 hover:opacity-100 disabled:opacity-40">
                        lưu thay đổi
                    </button>
                </div>
            </form>
        </div>
    @endif
</div>
