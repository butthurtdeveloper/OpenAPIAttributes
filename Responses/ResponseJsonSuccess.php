<?php

namespace OpenAPI\Responses;

use OpenApi\Attributes as OA;
use ReflectionClass;
use ReflectionException;

#[\Attribute(\Attribute::TARGET_CLASS)]
class ResponseJsonSuccess extends OA\Response
{
    /**
     * @throws ReflectionException
     */
    public function __construct(
        string $resource,
        int $response = 200,
        string $description = 'Success',
    ) {
        $className = (new ReflectionClass($resource))->getShortName();
        $ref = "#/components/schemas/{$className}";

        $content = new OA\JsonContent(
            ref: $ref
        );

        parent::__construct(
            response: $response,
            description: $description,
            content: $content
        );
    }
}
