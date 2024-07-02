<?php

namespace OpenAPI\Operation\Common;

use OpenApi\Generator;
use OpenAPI\Responses\ResponseUnauthorized;

trait ApiOperation
{
    public function __construct(
        string $path,
        array $tags,
        string $description,
        ?bool $auth = false,
    ) {
        $responses = $auth ? [new ResponseUnauthorized()] : [];

        parent::__construct([
            'path' => $path,
            'description' => $description,
            'security' => $auth ? [['sanctum' => []]] : Generator::UNDEFINED,
            'tags' => $tags,
            'value' => $this->combine($responses),
        ]);
    }
}
