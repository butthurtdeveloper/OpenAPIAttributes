<?php

namespace OpenAPI\Parameters;

use OpenApi\Attributes as OA;

class ParameterStringArray extends OA\Parameter
{
    public function __construct(
        string $parameter,
        ?string $in = 'query',
        ?string $description = null,
    ) {
        $description = $description ?? "Filter by {$parameter}";

        parent::__construct(
            name: $parameter . '[]',
            description: $description,
            in: $in,
            required: false,
            schema: new OA\Schema(
                type: 'array',
                items: new OA\Items(
                    type: 'string',
                    example: 'slug'
                )
            )
        );
    }
}
