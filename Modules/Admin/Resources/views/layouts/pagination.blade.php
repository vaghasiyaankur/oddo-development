@if($paginator->hasPages())
<div class="flex-shrink-0">
    <div class="text-muted">Showing <span class="fw-semibold">{{$paginator->currentPage()}}</span> of
        <span class="fw-semibold">{{$paginator->lastPage()}}</span> Results
    </div>
</div>
<ul class="pagination pagination-separated pagination-sm mb-0">
  <!-- Prevoius Page Link -->
  @if($paginator->onFirstPage())
    <li class="page-item disabled"><a class="page-link"><span>←</span></a></li>
  @else
    <li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" class="page-link" rel="prev">←</a></li>
  @endif

  <!-- Pagination Elements Here -->
  @foreach($elements as $element)
        <!-- Make three dots -->
        @if(is_string($element))
            <li class="page-item disabled"><a  class="page-link"><span>{{$element}}</span></a></li>
        @endif

       <!-- Links Array Here -->
       @if(is_array($element))
           @foreach($element as $page=>$url)
            @if($page == $paginator->currentPage())
                <li class="page-item active"><a class="page-link"><span>{{ $page }}</span></a></li>
            @else
                  <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
            @endif
           @endforeach
       @endif

  @endforeach

  <!-- Next Page Link -->
  @if($paginator->hasMorePages())
    <li class="page-item"><a href="{{ $paginator->nextPageUrl() }}" class="page-link"><span>→</span></a></li>
  @else
  <li class="page-item disabled"><a class="page-link"><span>→</span></a></li>
  @endif
</ul>

@endif