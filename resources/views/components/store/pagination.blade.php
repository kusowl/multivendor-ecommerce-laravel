@props(['paginator'])
@if ($paginator->hasPages())
    <div class="flex justify-center items-center space-x-4 mt-6">
        @if ($paginator->onFirstPage())
            <button class="btn btn-ghost btn-disabled" disabled>← Previous</button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-ghost">← Previous</a>
        @endif

        <span class="text-sm">
            Page {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}
        </span>

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-ghost">Next →</a>
        @else
            <button class="btn btn-ghost btn-disabled" disabled>Next →</button>
        @endif
    </div>
@endif
