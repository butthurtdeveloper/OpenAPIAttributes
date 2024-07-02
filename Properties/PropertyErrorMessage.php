<?php

namespace OpenAPI\Properties;

use OpenApi\Attributes as OA;

class PropertyErrorMessage extends OA\Property
{
    public function __construct()
    {
        parent::__construct(
            property: 'message',
            type: 'string',
            example: 'Some error message'
        );
    }
}
