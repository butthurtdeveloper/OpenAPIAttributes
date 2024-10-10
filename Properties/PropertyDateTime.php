<?php

namespace OpenAPI\Properties;

class PropertyDateTime extends PropertyString
{
    public function __construct(
        string $property,
        bool $nullable = false,
        ?string $description = null
    ) {
        $example = '2024-01-01 20:15:48.000';

        parent::__construct(
            property: $property,
            nullable: $nullable,
            example: $example,
            description: $description,
        );
    }
}
