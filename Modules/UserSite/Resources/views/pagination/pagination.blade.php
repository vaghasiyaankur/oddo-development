@if ($paginator->hasPages())
    <div class="col-sm-6">
        <div>
            <p class="mb-sm-0 text-muted">Showing <span class="fw-semibold">{{ $paginator->currentPage() }}</span> to
                <span class="fw-semibold">{{ $paginator->lastPage() }}</span> of <span
                    class="fw-semibold">{{ $paginator->lastPage() }}</span> entries
            </p>
        </div>
    </div>

    <div class="col-sm-6">
        <ul class="pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
            @else
                <li class="page-item">
                    <a href="{{ $paginator->previousPageUrl() }}" class="page-link">Previous</a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><a class="page-link"><span>{{ $page }}</span></a></li>
                        @else
                            <li class="page-item"><a href="{{ $url }}"
                                    class="page-link">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item"><a href="{{ $paginator->nextPageUrl() }}" class="page-link">Next</a></li>
            @else
                <li class="page-item disabled">
                    <a href="#" class="page-link">Next</a>
                </li>
            @endif
        </ul>
    </div><!-- end col -->
@endif
