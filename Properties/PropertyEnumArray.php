<?php

namespace OpenAPI\Properties;

use OpenApi\Attributes as OA;

class PropertyEnumArray extends OA\Property
{
    public function __construct(
        string $property,
        string $enum,
        bool $nullable = false,
        ?string $example = null,
    ) {
        $className = (new \ReflectionClass($enum))->getShortName();
        $ref = "#/components/schemas/{$className}";

        $exampleElement = $enum::cases()[0];
        $example = $example ?? [$exampleElement?->value ?? $exampleElement->name];

        if ($nullable) {
            return parent::__construct(
                property: $property,
                example: $example,
                nullable: true,
                anyOf: [
                    new OA\Schema(
                        type: 'array',
                        items: new OA\Items(ref: $ref),
                    ),
                    new OA\Schema(
                        type: 'null',
                    ),
                ]
            );
        }
        parent::__construct(
            property: $property,
            type: 'array',
            items: new OA\Items(ref: $ref),
            example: $example
        );
    }
}
