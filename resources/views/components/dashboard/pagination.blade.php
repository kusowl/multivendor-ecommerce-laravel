@props(['data' => []])
@if($data != [])
    <div class="pagination mt-4">
        <div class="sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700 dark:text-gray-300">
                    Showing
                    <span class="font-medium">{{$data['from']}}</span>
                    to
                    <span class="font-medium">{{$data['to']}}</span>
                    of
                    <span class="font-medium">{{$data['total']}}</span>
                    results
                </p>
            </div>
            <div>
                <nav aria-label="Pagination"
                     class="isolate inline-flex -space-x-px rounded-md shadow-xs dark:shadow-none">
                    <button
                        onclick="window.location.href='{{ $data['prev_page_url'] }}'"
                        @if($data['prev_page_url'] == null)
                            disabled="disabled"
                        @endif
                        class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 inset-ring inset-ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 dark:inset-ring-gray-300 dark:hover:bg-white/5">
                        <span class="sr-only">Previous</span>
                        <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true"
                             class="size-5">
                            <path
                                d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z"
                                clip-rule="evenodd" fill-rule="evenodd"/>
                        </svg>
                    </button>
                    <button
                        role="link"
                        onclick="window.location.href='{{ $data['next_page_url'] }}'"
                        @if($data['next_page_url'] == null)
                            disabled="disabled"
                        @endif
                        class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 inset-ring ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 dark:inset-ring-gray-300 dark:hover:bg-white/5">
                        <span class="sr-only">Next</span>
                        <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true"
                             class="size-5">
                            <path
                                d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                                clip-rule="evenodd"
                                fill-rule="evenodd"/>
                        </svg>
                    </button>

                </nav>
            </div>
        </div>
    </div>
@endif
