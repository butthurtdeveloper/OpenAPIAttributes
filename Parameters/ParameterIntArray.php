<?php

namespace OpenAPI\Parameters;

use OpenApi\Attributes as OA;

class ParameterIntArray extends OA\Parameter
{
    public function __construct(
        string $parameter,
        ?string $in = 'query',
        ?string $description = null,
        ?int $example = null,
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
                    type: 'integer',
                    example: $example
                )
            ),
        );
    }
}
