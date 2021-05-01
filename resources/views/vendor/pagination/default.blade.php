@if ($paginator->hasPages())
<nav class="p-pagination">
    <ul class="p-pagination__list" role="navigation">

        {{-- First Page View --}} 
            <li class="p-pagination__page-item {{ $paginator->onFirstPage() ? 'p-pagination__disabled' : '' }}">
            <a class="p-pagination__page-link" href="{{ $paginator->url(1) }}">&laquo;</a>
            </li>

        {{-- Previous Page Link --}} 
        <li class="p-pagination__page-item {{ $paginator->onFirstPage() ? 'p-pagination__disabled' : '' }}">
            <a class="p-pagination__page-link" href="{{ $paginator->previousPageUrl() }}">&lsaquo;</a>
        </li>


        {{-- Pagination Elements --}} 
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="p-pagination__disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())

                        <li class="p-pagination__active" aria-current="page"><span>&nbsp;{{ $page }}</span></li>

                        &nbsp;/&nbsp;

                        <li class="p-pagination__active" aria-current="page"><span>{{ $paginator->lastPage() }}&nbsp;</span></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        <li class="p-pagination__page-item {{ $paginator->currentPage() == $paginator->lastPage() ? 'p-pagination__disabled' : '' }}">
            <a class="p-pagination__page-link" href="{{ $paginator->nextPageUrl() }}">&rsaquo;</a>
        </li>

        {{-- Last Page Link --}}
        <li class="p-pagination__page-item {{ $paginator->currentPage() == $paginator->lastPage() ? 'p-pagination__disabled' : '' }}">
        <a class="p-pagination__page-link" href="{{ $paginator->url($paginator->lastPage()) }}">&raquo;</a>
        </li>
    </ul>
</nav>
@endif