<?php

namespace OpenAPI\Request;

use OpenApi\Attributes as OA;
use ReflectionClass;
use ReflectionException;

class RequestFormDataBody extends OA\RequestBody
{
    /**
     * @throws ReflectionException
     */
    public function __construct(
        string $resource
    ) {
        $className = (new ReflectionClass($resource))->getShortName();
        $ref = "#/components/schemas/{$className}";

        parent::__construct(
            content: [
                new OA\MediaType(
                    mediaType: 'multipart/form-data',
                    schema: new OA\Schema(
                        ref: $ref
                    ),
                ),
            ]
        );
    }
}
