<?php

namespace OpenAPI\Properties;

use OpenApi\Attributes as OA;

class PropertyInterval extends OA\Property
{
    public function __construct(
        string $property,
        bool $nullable = true
    ) {
        $items = [
            new PropertyInt(
                property: 'years',
                example: 2
            ),
            new PropertyInt(
                property: 'months',
                example: 10
            ),
            new PropertyInt(
                property: 'weeks',
                example: 3
            ),
            new PropertyInt(
                property: 'days',
                example: 3
            ),
            new PropertyInt(
                property: 'hours',
                example: 12
            ),
            new PropertyInt(
                property: 'minutes',
                example: 50
            ),
            new PropertyInt(
                property: 'seconds',
                example: 10
            ),
            new PropertyInt(
                property: 'microseconds',
                example: 10
            ),
        ];

        if ($nullable) {
            return parent::__construct(
                property: $property,
                nullable: true,
                anyOf: [
                    new OA\Schema(
                        properties: $items,
                        type: 'object',
                    ),
                    new OA\Schema(
                        type: 'null',
                    ),
                ]
            );
        }

        return parent::__construct(
            property: $property,
            properties: $items,
            type: 'object',
        );
    }
}
