<?php

namespace OpenAPI\Properties;

use OpenApi\Attributes as OA;
use ReflectionClass;
use ReflectionException;

class PropertyResource extends OA\Property
{
    /**
     * @throws ReflectionException
     */
    public function __construct(
        string $property,
        string $resource,
        ?bool $nullable = false,
        ?string $description = null
    ) {
        $className = (new ReflectionClass($resource))->getShortName();
        $ref = "#/components/schemas/{$className}";
        if ($nullable) {
            return parent::__construct(
                property: $property,
                description: $description,
                nullable: true,
                anyOf: [
                    new OA\Schema(
                        ref: $ref
                    ),
                    new OA\Schema(
                        type: 'null',
                    ),
                ]
            );
        }
        parent::__construct(
            property: $property,
            ref: $ref,
            description: $description,
            type: 'object',
            nullable: $nullable
        );
    }
}
