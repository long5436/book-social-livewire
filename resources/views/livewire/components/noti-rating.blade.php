<div>
    @if ($isShow)
        <div class="bg-black/50 backdrop-blur-lg fixed inset-0 z-50">
            <div class="fixed top-20 left-1/2 z-50">
                <div id="congrats-container"
                    class=" transform -translate-x-1/2 -translate-y-1/2 bg-green-500 text-white px-6 py-4 rounded-md shadow-lg">
                    <div class="flex items-center justify-between">
                        <h2 class="text-2xl font-bold mb-4">Chúc mừng!</h2>
                        <button wire:click="closeNoti"
                            class="flex items-center justify-center h-10 w-10 border border-black/10 rounded-full hover:bg-white/10">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <p class="text-lg">Đánh giá của bạn đã được ghi nhận thành công.</p>
                    <div id="starburst" class="hidden">
                        <div class="star"></div>
                        <div class="star"></div>
                        <div class="star"></div>
                        <div class="star"></div>
                        <div class="star"></div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
