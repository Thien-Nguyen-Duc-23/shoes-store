@if ($paginator->hasPages())
    <div class="text-center">
        <nav class="clearfix">
            <ul class="pagination clearfix">
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled">
                        <a class="page-link" href="#">←</a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}">←</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="active page-item disabled">
                                    <a class="page-link" href="#">{{ $page }}</a>
                                </li>
                            @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @elseif ($page == $paginator->lastPage() - 1)
                                <li class="page-item"><a class="page-link" href="">...</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" style="line-height: 15px">
                            <span>→</span>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled"><a class="page-link" href="#">→</a></li>
                @endif
            </ul>
        </nav>
    </div>
@endif
