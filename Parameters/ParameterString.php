<?php

namespace OpenAPI\Parameters;

use OpenApi\Attributes as OA;

class ParameterString extends OA\Parameter
{
    public function __construct(
        string $parameter,
        ?string $in = 'query',
        ?string $description = null,
        ?bool $required = false,
    ) {
        $description = $description ?? "Filter by {$parameter}";

        parent::__construct(
            name: $parameter,
            description: $description,
            in: $in,
            required: $required,
        );
    }
}
