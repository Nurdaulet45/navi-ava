@if ($paginator->hasPages())
    <div class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <div class="prev disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12.2561 15.5894C12.5815 15.264 12.5815 14.7363 12.2561 14.4109L7.84534 10.0002L12.2561 5.58941C12.5815 5.264 12.5815 4.73633 12.2561 4.41091C11.9307 4.0855 11.403 4.0855 11.0776 4.41091L6.07757 9.41091C5.75214 9.73633 5.75214 10.264 6.07757 10.5894L11.0776 15.5894C11.403 15.9149 11.9307 15.9149 12.2561 15.5894Z"
                        fill="#1DC0BD"/>
                </svg>
            </div>
        @else
            <a class="prev" href="{{ $paginator->previousPageUrl() }}" rel="prev"
               aria-label="@lang('pagination.previous')">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12.2561 15.5894C12.5815 15.264 12.5815 14.7363 12.2561 14.4109L7.84534 10.0002L12.2561 5.58941C12.5815 5.264 12.5815 4.73633 12.2561 4.41091C11.9307 4.0855 11.403 4.0855 11.0776 4.41091L6.07757 9.41091C5.75214 9.73633 5.75214 10.264 6.07757 10.5894L11.0776 15.5894C11.403 15.9149 11.9307 15.9149 12.2561 15.5894Z"
                        fill="#1DC0BD"/>
                </svg>
            </a>
        @endif

        <div class="page-numbers">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <div class="page-number disabled" aria-disabled="true">{{ $element }}</div>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <div class="page-number active" aria-current="page">{{ $page }}</div>
                        @else
                            <a class="page-number" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="next" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7.74392 15.5894C7.41851 15.264 7.41851 14.7363 7.74392 14.4109L12.1547 10.0002L7.74392 5.58941C7.4185 5.264 7.4185 4.73633 7.74392 4.41091C8.06934 4.0855 8.597 4.0855 8.92242 4.41091L13.9224 9.41091C14.2479 9.73633 14.2479 10.264 13.9224 10.5894L8.92242 15.5894C8.597 15.9149 8.06934 15.9149 7.74392 15.5894Z"
                        fill="#1DC0BD"/>
                </svg>
            </a>
        @else
            <div class="next disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7.74392 15.5894C7.41851 15.264 7.41851 14.7363 7.74392 14.4109L12.1547 10.0002L7.74392 5.58941C7.4185 5.264 7.4185 4.73633 7.74392 4.41091C8.06934 4.0855 8.597 4.0855 8.92242 4.41091L13.9224 9.41091C14.2479 9.73633 14.2479 10.264 13.9224 10.5894L8.92242 15.5894C8.597 15.9149 8.06934 15.9149 7.74392 15.5894Z"
                        fill="#1DC0BD"/>
                </svg>
            </div>
        @endif
    </div>
@endif
