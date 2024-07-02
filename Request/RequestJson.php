<?php

namespace OpenAPI\Request;

use OpenApi\Attributes as OA;

#[\Attribute(\Attribute::TARGET_CLASS)]
class RequestJson extends OA\RequestBody
{
    public function __construct(
        string $request
    ) {
        $content = new OA\JsonContent(ref: $request);

        parent::__construct(
            content: $content
        );
    }
}
