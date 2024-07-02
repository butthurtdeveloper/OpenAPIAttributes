<?php

namespace OpenAPI\Responses;

use OpenApi\Attributes as OA;
use OpenAPI\Properties\PropertyErrorMessage;

#[\Attribute(\Attribute::TARGET_CLASS)]
class ResponseUnauthorized extends OA\Response
{
    public function __construct()
    {
        $content = new OA\JsonContent(
            properties: [new PropertyErrorMessage()]
        );
        parent::__construct(
            response: 401,
            description: 'Unauthenticated',
            content: $content
        );
    }
}
