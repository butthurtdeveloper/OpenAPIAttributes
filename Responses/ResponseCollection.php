<?php

namespace OpenAPI\Responses;

use OpenApi\Attributes as OA;

#[\Attribute(\Attribute::TARGET_CLASS)]
class ResponseCollection extends OA\Response
{
    public function __construct(string $ref)
    {
        $content = new OA\JsonContent(
            type: 'array',
            items: new OA\Items(
                ref: $ref,
            )
        );

        parent::__construct(
            response: 200,
            description: 'Success',
            content: $content
        );
    }
}
