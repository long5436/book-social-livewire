<div class="max-w-screen-xl mx-auto md:px-8 2xl:px-0 pt-8 ">
    <livewire:components.meta />

    <div class="block md:flex">
        <div class="w-full px-0 md:w-9/12">

            <div class="px-4 md:px-0">

                <livewire:components.most-read-books />

                <h2 class="font-medium text-2xl py-4">Sách mới</h2>
                <livewire:components.book-grid :books="$booksNew" />

                <div class="text-center py-4">
                    <livewire:components.pagination :currentPage="$page" :totalPage="$totalPages" />
                </div>
            </div>

            <div class="px-4 md:px-0">
                <h2 class="font-medium text-2xl py-4">Danh mục sách</h2>
                <livewire:components.categories />
            </div>
        </div>
        <div class="w-full px-0 md:w-3/12">

            <livewire:components.sidebar-post />
        </div>

    </div>
</div>
