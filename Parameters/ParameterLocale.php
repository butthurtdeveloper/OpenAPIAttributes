<?php

namespace OpenAPI\Parameters;

use OpenApi\Attributes as OA;

class ParameterLocale extends OA\Parameter
{
    public function __construct()
    {
        parent::__construct(
            name: 'X-Locale',
            description: 'Request locale',
            in: 'header',
            required: false,
            schema: new OA\Schema(ref: '#/components/schemas/Locale')
        );
    }
}
