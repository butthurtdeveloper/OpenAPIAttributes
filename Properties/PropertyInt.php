<?php

namespace OpenAPI\Properties;

use OpenApi\Attributes as OA;

class PropertyInt extends OA\Property
{
    public function __construct(
        string $property,
        bool $nullable = false,
        int $example = 23,
        ?string $description = null
    ) {
        if ($nullable) {
            return parent::__construct(
                property: $property,
                description: $description,
                example: $example,
                nullable: true,
                anyOf: [
                    new OA\Schema(
                        type: 'integer',
                    ),
                    new OA\Schema(
                        type: 'null',
                    ),
                ]
            );
        }

        parent::__construct(
            property: $property,
            description: $description,
            type: 'integer',
            example: $example,
        );
    }
}
