<?php

namespace App\Dto\Base;

use Illuminate\Contracts\Pagination\Paginator;

class PaginationLinksDto
{
    public function __construct(
        public ?string $first,
        public ?string $last,
        public ?string $prev,
        public ?string $next,
        public ?string $self,
    ) {}

    /**
     * Create from Laravel Paginator
     */
    public static function fromPaginator(Paginator $paginator): self
    {
        return new self(
            first: $paginator->url(1),
            last: $paginator->url($paginator->lastPage()),
            prev: $paginator->previousPageUrl(),
            next: $paginator->nextPageUrl(),
            self: request()->fullUrl(),
        );
    }

    /**
     * Check if any links exist
     */
    public function hasLinks(): bool
    {
        return ! empty(array_filter([
            $this->first,
            $this->last,
            $this->prev,
            $this->next,
        ]));
    }
}
