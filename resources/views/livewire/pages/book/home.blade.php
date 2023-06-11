<div class="max-w-screen-xl mx-auto md:px-8 xl:px-0 pt-8 ">

    <div class="block md:flex">
        <div class="w-full px-0 md:w-9/12">
            <div class="px-4 md:px-0">
                <h2 class="font-medium text-2xl py-4">Danh mục sách</h2>
                <livewire:components.categories />
            </div>
            <div class="px-4 md:px-0">
                <h2 class="font-medium text-2xl py-4">Sách mới</h2>
                <livewire:components.book-grid :books="$booksNew" />
            </div>
        </div>
        <div class="w-full px-0 md:w-3/12"></div>

    </div>
    <footer class="bg-gray-50 py-4 px-8">
        <div class="grid grid-cols-4 gap-x-4">
            <div>
                <h3 class="text-2xl font-medium"></h3>
                <a href="#"> <img class="h-14" src="/images/logo.png" alt=""></a>
                <p class="pt-2 flex">Đọc Sách Hay Tại Sách Đỉnh Cao</p>
            </div>
            <div class="mb-5">
                <h3 class="text-2xl font-medium">Pages</h3>
                <li>                  
                    <a title="Bản quyền nội dung" href="#" class="link-default">Bản quyền nội dung</a>           
                </li>
                <li>           
                    <a title="Qui định sử dụng" href="#" class="link-default">Qui định sử dụng</a>
                </li>
                <li>
                    <a title="postblog" href="http://127.0.0.1:8000/postblog" class="link-default">Trang blog</a>
                </li>

            </div>
            <div class="mb-5">
                <h3 class="text-2xl font-medium">Bài Viết</h3>
             
            </div>
            <div class="mb-5">
                <h3 class="text-2xl font-medium">Theo dỏi</h3>
                <div>
                    <a href="#" class="text-gray-500 hover:text-gray-700">
                        <i class="fab fa-facebook-square text-3xl mr-2"></i>
                        <a href="#" class="text-gray-500 hover:text-gray-700">
                            <i class="fab fa-twitter-square text-3xl mr-2"></i>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-700">
                            <i class="fab fa-instagram-square text-3xl mr-2"></i>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-700">
                            <i class="fab fa-youtube-square text-3xl mr-2"></i>
                        </a>
                </div>
            </div>
    </footer>
</div>
