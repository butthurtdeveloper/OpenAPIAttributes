<?php

namespace OpenAPI\Parameters;

use OpenApi\Attributes as OA;

class ParameterSort extends OA\Parameter
{
    public function __construct(array $columns)
    {
        $enum = [];
        foreach ($columns as $column) {
            $enum[] = $column;
            $enum[] = "{$column}-desc";
        }
        parent::__construct(
            name: 'sort[]',
            description: 'Sort by column',
            in: 'query',
            required: false,
            schema: new OA\Schema(
                type: 'array',
                items: new OA\Items(
                    type: 'enum',
                    enum: $enum
                )
            )
        );
    }
}
