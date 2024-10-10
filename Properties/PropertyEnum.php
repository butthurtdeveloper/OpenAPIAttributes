<?php

namespace OpenAPI\Properties;

use OpenApi\Attributes as OA;
use ReflectionClass;
use ReflectionException;

class PropertyEnum extends OA\Property
{
    /**
     * @throws ReflectionException
     */
    public function __construct(
        string $property,
        string|\UnitEnum $enum,
        bool $nullable = false,
        ?string $example = null,
    ) {
        $className = (new ReflectionClass($enum))->getShortName();
        $ref = "#/components/schemas/{$className}";

        $example = $example ?? ($enum::cases()[0]->value || $enum::cases()[0]->name);

        if ($nullable) {
            return parent::__construct(
                property: $property,
                example: $example,
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
            type: 'enum',
            example: $example
        );
    }
}
