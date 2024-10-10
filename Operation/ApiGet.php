<?php

namespace OpenAPI\Operation;

use OpenApi\Annotations\Get;
use OpenApi\Attributes as OA;
use OpenAPI\Operation\Common\ApiOperation;

#[\Attribute(\Attribute::TARGET_CLASS)]
class ApiGet extends Get
{
    use ApiOperation {
        ApiOperation::__construct as private __apiConstruct;
    }

    public function __construct(
        string $path,
        array $tags,
        string $description,
        ?string $summary = null,
        ?array $parameters = [],
        ?bool $auth = false,
        ?bool $paginate = false,
        ?bool $paginateCursor = false,
        ?bool $locale = true
    ) {
        if ($paginate) {
            $this->setPaginateParameters($parameters);
        }

        if ($paginateCursor) {
            $this->setPaginateParameters($parameters);
        }

        $this->__apiConstruct(
            path: $path,
            tags: $tags,
            description: $description,
            summary: $summary,
            parameters: $parameters,
            auth: $auth,
            locale: $locale
        );
    }

    private function setPaginateParameters(&$parameters): void
    {
        $parameters[] = new OA\Parameter(
            name: 'page',
            description: 'Pagination page',
            in: 'query',
            required: false,
            schema: new OA\Schema(type: 'integer'),
            example: 1
        );
        $parameters[] = new OA\Parameter(
            name: 'per_page',
            description: 'Pagination item per page',
            in: 'query',
            required: false,
            schema: new OA\Schema(type: 'integer'),
            example: 10
        );
    }

    private function setCursorPaginateParameters(&$parameters): void
    {
        $parameters[] = new OA\Parameter(
            name: 'cursor',
            description: 'Pagination cursor',
            in: 'query',
            required: false,
            schema: new OA\Schema(type: 'string'),
            example: 'eyJpZCI6MTUsIl9wb2ludHNUb05leHRJdGVtcyI6dHJ1ZX0'
        );
        $parameters[] = new OA\Parameter(
            name: 'per_page',
            description: 'Pagination item per page',
            in: 'query',
            required: false,
            schema: new OA\Schema(type: 'integer'),
            example: 10
        );
    }
}
