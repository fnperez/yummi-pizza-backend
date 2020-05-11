<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Resources\Json\ResourceCollection;

abstract class PaginatedCollection extends ResourceCollection
{
    public function toArray($request)
    {
        if ($this->resource instanceof LengthAwarePaginator) {
            return [
                'data' => $this->collection,
                'links' => [
                    'next_page_url' => $this->nextPageUrl(),
                    'prev_page_url' => $this->previousPageUrl(),
                ],
                'meta' => [
                    'current_page' => $this->currentPage(),
                    'per_page' => $this->perPage(),
                    'total_pages' => $this->lastPage(),
                    'total_records' => $this->total(),
                ]
            ];
        }

        return ['data' => $this->collection];
    }
}
