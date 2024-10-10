<?php

namespace OpenAPI\Properties;

use OpenApi\Attributes as OA;

class PropertyStringArray extends OA\Property
{
    public function __construct(
        string $property,
        bool $nullable = false,
        ?array $example = null,
    ) {
        parent::__construct(
            property: $property,
            type: 'array',
            items: new OA\Items(type: 'string'),
            example: $example,
            nullable: $nullable
        );
    }
}
