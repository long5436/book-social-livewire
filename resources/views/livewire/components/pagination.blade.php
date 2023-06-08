{{-- <nav aria-label="Page navigation example">
    <ul class="inline-flex items-center -space-x-px">

        @if ($currentPage != 1)
            <li>
                <a href="?page={{ $currentPage - 1 }}"
                    class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <span class="sr-only">Previous</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </li>
        @endif

        @for ($i = 1; $i <= $totalPage; $i++)
            <li>
                <a href="?page={{ $i }}"
                    class="px-3 py-2 leading-tight text-gray-500 bg-white border dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white {{ $currentPage == $i ? 'text-blue-600 border border-blue-300 hover:bg-blue-100 hover:text-blue-70 z-10 bg-blue-300' : 'border-gray-300 hover:bg-gray-100 hover:text-gray-700' }}">{{ $i }}</a>
            </li>
        @endfor

        @if ($currentPage != $totalPage)
            <li>
                <a href="?page={{ $currentPage + 1 }}"
                    class="block px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <span class="sr-only">Next</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </li>
        @endif
    </ul>
</nav> --}}
@php
    $url = request()->fullUrl();
    $url = preg_replace('/([?&])page=[^&]+(&|$)/', '$1', $url);
@endphp


<nav aria-label="Page navigation example">
    <ul class="inline-flex items-center -space-x-px">

        @if ($currentPage != 1)
            <li>
                <a href="{{ $url }}{{ strpos($url, '?') !== false ? '&' : '?' }}page={{ $currentPage - 1 }}"
                    class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <span class="sr-only">Previous</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </li>
        @endif

        <?php
        $visiblePages = 5; // Số lượng trang hiển thị trung tâm
        $ellipsis = false;
        
        // Tính toán trang đầu và trang cuối
        $startPage = max(1, $currentPage - $visiblePages);
        $endPage = min($totalPage, $currentPage + $visiblePages);
        
        // Kiểm tra xem có hiển thị dấu "..." ở đầu danh sách trang không
        if ($startPage > 1) {
            $startPage++;
            $ellipsis = true;
        }
        
        // Kiểm tra xem có hiển thị dấu "..." ở cuối danh sách trang không
        if ($endPage < $totalPage) {
            $endPage--;
            $ellipsis = true;
        }
        ?>

        @if ($ellipsis)
            <li>
                <span
                    class="px-3 py-2 leading-tight text-gray-500 bg-white border dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</span>
            </li>
        @endif

        @for ($i = $startPage; $i <= $endPage; $i++)
            <li>
                <a href="{{ $url }}{{ strpos($url, '?') !== false ? '&' : '?' }}page={{ $i }}"
                    class="px-3 py-2 leading-tight text-gray-500 bg-white border dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white {{ $currentPage == $i ? 'text-blue-600 border border-blue-300 hover:bg-blue-100 hover:text-blue-70 z-10 bg-blue-300' : 'border-gray-300 hover:bg-gray-100 hover:text-gray-700' }}">{{ $i }}</a>
            </li>
        @endfor

        @if ($ellipsis)
            <li>
                <span
                    class="px-3 py-2 leading-tight text-gray-500 bg-white border dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</span>
            </li>
        @endif

        @if ($currentPage != $totalPage)
            <li>
                <a href="{{ $url }}{{ strpos($url, '?') !== false ? '&' : '?' }}page={{ $currentPage + 1 }}"
                    class="block px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <span class="sr-only">Next</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </li>
        @endif
    </ul>
</nav>
