<div class="flex items-center justify-between">
    {{-- Showing information --}}
    <div>
        Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} data
    </div>

    {{-- Pagination Controls --}}
    @if ($paginator->hasPages())
        <nav class="flex items-center gap-x-1">
            {{-- Previous Button --}}
            @if ($paginator->onFirstPage())
                <button type="button" class="btn btn-soft rounded-full" disabled>Previous</button>
            @else
                <button type="button" wire:click="previousPage" wire:loading.attr="disabled" rel="prev"
                    class="btn btn-soft rounded-full">
                    Previous
                </button>
            @endif

            {{-- Page Numbers --}}
            <div class="flex items-center gap-x-1">
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span class="btn btn-circle btn-soft cursor-default">{{ $element }}</span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <button type="button" aria-current="page"
                                    class="btn btn-circle btn-soft text-bg-soft-primary">
                                    {{ $page }}
                                </button>
                            @else
                                <button type="button" wire:click="gotoPage({{ $page }})"
                                    class="btn btn-circle btn-soft">
                                    {{ $page }}
                                </button>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>

            {{-- Next Button --}}
            @if ($paginator->hasMorePages())
                <button type="button" wire:click="nextPage" wire:loading.attr="disabled" rel="next"
                    class="btn btn-soft rounded-full">
                    Next
                </button>
            @else
                <button type="button" class="btn btn-soft rounded-full" disabled>Next</button>
            @endif
        </nav>
    @endif
</div>
