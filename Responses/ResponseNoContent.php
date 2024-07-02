<?php

namespace OpenAPI\Responses;

use OpenApi\Attributes as OA;

#[\Attribute(\Attribute::TARGET_CLASS)]
class ResponseNoContent extends OA\Response
{
    public function __construct()
    {
        parent::__construct(
            response: 204,
            description: 'Success'
        );
    }
}
