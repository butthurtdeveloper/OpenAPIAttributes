<?php

namespace OpenAPI\Parameters;

use OpenApi\Attributes as OA;
use ReflectionClass;
use ReflectionException;

class ParameterEnumArray extends OA\Parameter
{
    /**
     * @throws ReflectionException
     */
    public function __construct(
        string $parameter,
        string|\UnitEnum $enum,
        ?string $in = 'query',
        ?string $description = null,
    ) {
        $className = (new ReflectionClass($enum))->getShortName();
        $ref = "#/components/schemas/{$className}";

        $description = $description ?? "Filter by {$parameter}";

        parent::__construct(
            name: $parameter . '[]',
            description: $description,
            in: $in,
            required: false,
            schema: new OA\Schema(
                type: 'array',
                items: new OA\Items(
                    ref: $ref,
                    type: 'enum',
                )
            )
        );
    }
}
