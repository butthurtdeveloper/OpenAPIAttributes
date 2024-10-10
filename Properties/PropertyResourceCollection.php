<?php

namespace OpenAPI\Properties;

use OpenApi\Attributes as OA;
use ReflectionException;

class PropertyResourceCollection extends OA\Property
{
    /**
     * @throws ReflectionException
     */
    public function __construct(
        string $property,
        string $resource,
        ?bool $nullable = false
    ) {
        $className = (new \ReflectionClass($resource))->getShortName();
        $ref = "#/components/schemas/{$className}";

        parent::__construct(
            property: $property,
            type: 'array',
            items: new OA\Items(ref: $ref),
            nullable: $nullable
        );
    }
}
