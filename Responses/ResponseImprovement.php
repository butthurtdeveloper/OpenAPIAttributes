<?php

namespace OpenAPI\Responses;

use OpenApi\Attributes as OA;
use OpenAPI\Properties\PropertyResource;
use ReflectionException;

#[\Attribute(\Attribute::TARGET_CLASS)]
class ResponseImprovement extends OA\Response
{
    /**
     * @throws ReflectionException
     */
    public function __construct(
        string $resource,
        int $response = 200,
        string $description = 'Success',
    ) {
        $content = new OA\JsonContent(
            required: ['origin'],
            properties: [
                new PropertyResource(
                    property: 'origin',
                    resource: $resource,
                ),
                new PropertyResource(
                    property: 'improvement',
                    resource: $resource,
                    nullable: true
                ),
            ],
        );

        parent::__construct(
            response: $response,
            description: $description,
            content: $content
        );
    }
}
