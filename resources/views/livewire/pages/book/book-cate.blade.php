@php
    $metaData = $cate;
    $metaData->description = 'Sách cho thể loại ' . $cate->name;
    // dd($metaData);
@endphp



<div class="max-w-screen-lg mx-auto md:px-8 xl:px-0 pt-8 ">
    <livewire:components.meta :data="$metaData" />

    <div class="">

        <div class="px-4 md:px-0">
            <h2 class="font-medium text-2xl py-4">{{ $cate->name }}</h2>
            <livewire:components.book-grid :books="$books" />

            <div class="text-center py-4">
                <livewire:components.pagination :currentPage="$page" :totalPage="$totalPages" />
            </div>
        </div>

        <div class="px-4 md:px-0">
            <h2 class="font-medium text-2xl py-4">Danh mục sách</h2>
            <livewire:components.categories />
        </div>
    </div>
</div>
