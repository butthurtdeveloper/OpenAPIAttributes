<?php

namespace OpenAPI\Parameters;

use OpenApi\Attributes as OA;
use ReflectionClass;
use ReflectionException;

class ParameterEnum extends OA\Parameter
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
            name: $parameter,
            description: $description,
            in: $in,
            required: false,
            schema: new OA\Schema(ref: $ref)
        );
    }
}
