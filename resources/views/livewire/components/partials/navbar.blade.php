<div class="sticky top-0 z-40 lg:border-b lg:border-slate-900/10 dark:border-slate-50/[0.06]">
    <div
        class="w-full backdrop-blur-lg flex-none transition-colors duration-500 lg:z-50  bg-white/80 supports-backdrop-blur:bg-white/60 dark:bg-transparent border-b border-slate-900/10 lg:px-8 lg:border-0 dark:border-slate-300/10">
        <div class="max-w-screen-xl mx-auto">
            <div class="py-4 mx-4 lg:mx-0 flex justify-between">

                <div class="flex items-center">
                    <a href="/">
                        <img class="h-10" src="{{ asset('images/logo.png') }}" alt="">
                    </a>
                </div>
                <div class="hidden md:flex">
                    <form
                        class="border border-slate-300 rounded-full px-3 flex items-center me-6 focus-within:border-primary"
                        {{-- action="{{ route('book.search') }}" method="GET" --}}>
                        <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
                        <input type="text" placeholder="Tìm kiếm sách, bài viết"
                            class="border-hidden bg-transparent py-1 outline-none ps-2 caret-primary" name="name" />
                    </form>
                    <ul class="flex items-center gap-4">
                        <li>
                            <a href="/" class="font-medium">Top sách</a>
                        </li>
                        <li>
                            <a href="/" class="font-medium">Diễn đàn</a>
                        </li>
                        <li>
                            <a href="/" class="font-medium">Thành viên</a>
                        </li>
                    </ul>
                    <div class="flex items-center ms-4 border-s-2 ps-4">

                        @if (isset(Auth::user()->name))
                            <div class="cursor-pointer relative group">

                                {{-- <img src="" alt=""> --}}
                                <i
                                    class="fa-solid fa-user w-8 h-8 rounded-full text-center leading-8 bg-gray-100 text-gray-400"></i>
                                <span class="ms-2 pe-2">{{ Auth::user()->name }}</span>
                                <i class="fa-solid fa-chevron-down text-gray-400 "></i>

                                <div
                                    class="p-2 absolute end-0 invisible group-hover:visible transition duration-500 bg-white border rounded-md">


                                    <a href="#"
                                        class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700"
                                        role="menuitem">
                                        Tài khoản
                                    </a>

                                    <button type="button" wire:click="btnLogout"
                                        class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700"
                                        role="menuitem">
                                        Đăng xuất
                                    </button>

                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}"
                                class="inline-block bg-primary text-white px-4 py-1 rounded-lg text-base hover:opacity-90">Đăng
                                nhập</a>
                        @endif
                    </div>
                </div>

                <div class="md:hidden flex gap-2 items-center relative">
                    <button
                        class="h-9 w-9 flex items-center justify-center hover:border hover:border-primary rounded-full hover:bg-primary/10 border">
                        <i class="fa-solid fa-search text-gray-400"></i>
                    </button>
                    <button id="btn-open-mobile-nav" wire:click="toggleMobileNav"
                        class="h-9 w-9 flex items-center justify-center hover:border hover:border-primary  rounded-full hover:bg-primary/10 border">
                        <i class="fa-solid fa-bars text-gray-400"></i>
                    </button>

                </div>
            </div>
        </div>

    </div>

    @if ($isNavMobile)

        <div class="fixed z-50 bg-black/20 inset-0 h-screen backdrop-blur transition-" id="mobile-nav">
            <div class="absolute flex h-screen flex-col justify-between border-e w-80 bg-white end-0">
                <div class="px-4 py-6">
                    <div class="flex justify-between">
                        <button id="btn-close-mobile-nav" wire:click="toggleMobileNav"
                            class="flex items-center justify-center bg-gray-200 w-10 rounded-full hover:bg-green-900/20">
                            <i class="fa-solid fa-xmark text-gray-400"></i>
                        </button>
                        <img class="h-10" src="{{ asset('images/logo.png') }}" alt="">
                    </div>

                    @if (isset(Auth::user()->name))
                        <div class="flex items-center mt-4">
                            <div class="cursor-pointer relative group">

                                <i
                                    class="fa-solid fa-user w-8 h-8 rounded-full text-center leading-8 bg-gray-100 text-gray-400"></i>
                                <span class="ms-2 pe-2">{{ Auth::user()->name }}</span>

                            </div>
                        </div>

                        <nav aria-label="Main Nav" class="mt-6 flex flex-col space-y-1">

                            <a href="#"
                                class="flex items-center gap-2 rounded-lg bg-gray-100 px-4 py-2 text-gray-700 hover:bg-green-700/20">

                                <span class=""> Tài khoản </span>
                            </a>
                            <a href="#" wire:click="btnLogout"
                                class="flex
                                items-center gap-2 rounded-lg bg-gray-100 px-4 py-2 text-gray-700
                                hover:bg-green-700/20">

                                <span class=""> Đăng xuất </span>
                            </a>

                        </nav>
                    @else
                        <a href="{{ route('login') }}"
                            class="inline-block bg-primary text-white px-4 py-1 rounded-lg text-base hover:opacity-90">Đăng
                            nhập</a>
                    @endif
                </div>
            </div>
        </div>
    @endif

</div>
