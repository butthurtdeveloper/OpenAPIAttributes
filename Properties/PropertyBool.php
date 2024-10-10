<?php

namespace OpenAPI\Properties;

use OpenApi\Attributes as OA;

class PropertyBool extends OA\Property
{
    public function __construct(
        string $property,
        bool $nullable = false,
        ?string $description = null
    ) {
        if ($nullable) {
            return parent::__construct(
                property: $property,
                description: $description,
                example: true,
                nullable: true,
                anyOf: [
                    new OA\Schema(
                        type: 'boolean',
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
            type: 'boolean',
            example: true,
        );
    }
}
