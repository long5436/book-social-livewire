@php
    // $metaData = ['name' => ''];
    // $metaData = (object) json_decode(json_encode($metaData), true);
    // $metaData->name = 'Kết quả tìm kếm cho từ khoá "' . $keyword . '" ';
    // $metaData->description = 'Kết quả tìm kếm cho từ khoá "' . $keyword . '" ';
    // $str = 'Kết quả tìm kếm cho từ khoá "' . $keyword . '" ';
    
    // $metaData = json_encode([
    //     'name' => $str,
    //     'description' => $str,
    // ]);
    
    // dd(json_decode($metaData));
    
    // đang có lỗi ở đây
@endphp



<div class="max-w-screen-xl mx-auto md:px-8 xl:px-0 pt-8 ">
    <livewire:components.meta />

    <div class="max-w-screen-lg mx-auto pt-2 px-6 ">

        <div class="px-4 md:px-0">
            <h2 class="font-medium text-2xl py-4">Kết quả tìm kiếm cho từ khoá: "{{ $keyword }}"</h2>
            <livewire:components.book-grid :books="$books" />

            <div class="text-center py-4">
                <livewire:components.pagination :currentPage="$page" :totalPage="$totalPages" />
            </div>
        </div>

        {{-- <div class="px-4 md:px-0">
            <h2 class="font-medium text-2xl py-4">Danh mục sách</h2>
            <livewire:components.categories />
        </div> --}}
    </div>
</div>
