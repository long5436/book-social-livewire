@php
    $url = request()->fullUrl();
    $url = preg_replace('/([?&])page=[^&]+(&|$)/', '$1', $url);
@endphp

<nav class="flex justify-center py-4">
    <ul class="flex gap-1 items-center">

        @php
            $href = $url . (strpos($url, '?') !== false ? '&' : '?') . 'page=';
            $pagiArray = $this->generatePaginationArray($currentPage, $totalPage);
            // dd($pagiArray);
        @endphp


        @if ($currentPage != 1)
            <li>
                <a href="{{ $href . $currentPage - 1 }}"
                    class="border border-primary/50 py-1 px-3 text-primary rounded-sm bg-white hover:bg-primary hover:text-white">
                    <i class="fa-solid fa-chevron-left text"></i>
                </a>
            </li>
        @endif

        @foreach ($pagiArray as $pagi)
            @php
                $result = is_numeric($pagi) ? $href . $pagi : '#';
            @endphp

            <li>
                <a href="{{ $result }}"
                    class="border border-primary/50 py-1 px-3 rounded-sm  hover:bg-primary hover:text-white {{ $currentPage == $pagi ? 'bg-primary text-white' : 'bg-white text-primary' }}">
                    {{ $pagi }}
                </a>
            </li>
        @endforeach

        @if ($currentPage != $totalPage)
            <li>
                <a href="{{ $href . $currentPage + 1 }}"
                    class="border border-primary/508 py-1 px-3 text-primary rounded-sm bg-white hover:bg-primary hover:text-white">
                    <i class="fa-solid fa-chevron-right"></i>
                </a>
            </li>
        @endif
    </ul>
</nav>
