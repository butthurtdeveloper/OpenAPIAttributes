<?php

namespace OpenAPI\Operation\Common;

use OpenApi\Attributes\RequestBody;
use OpenApi\Generator;
use OpenAPI\Parameters\ParameterLocale;
use OpenAPI\Responses\ResponseUnauthorized;

trait ApiOperation
{
    public function __construct(
        string $path,
        array $tags,
        string $description,
        ?string $summary = null,
        ?array $parameters = [],
        ?RequestBody $requestBody = null,
        ?bool $auth = false,
        ?bool $locale = true,
    ) {
        $responses = $auth ? [new ResponseUnauthorized()] : [];

        if ($locale) {
            $parameters[] = new ParameterLocale();
        }

        parent::__construct([
            'path' => $path,
            'description' => $description,
            'security' => $auth ? [['sanctum' => []]] : Generator::UNDEFINED,
            'tags' => $tags,
            'value' => $this->combine($responses, $parameters, $requestBody),
            'summary' => $summary,
        ]);
    }
}
