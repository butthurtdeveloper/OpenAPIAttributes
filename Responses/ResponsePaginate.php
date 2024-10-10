<?php

namespace OpenAPI\Responses;

use OpenApi\Attributes as OA;
use OpenAPI\Properties\PropertyBool;
use OpenAPI\Properties\PropertyInt;
use OpenAPI\Properties\PropertyString;

#[\Attribute(\Attribute::TARGET_CLASS)]
class ResponsePaginate extends OA\Response
{
    public function __construct(string $ref)
    {
        $data = new OA\Property(
            property: 'data',
            type: 'array',
            items: new OA\Items(
                ref: $ref,
            ),
        );

        $links = new OA\Property(
            property: 'links',
            properties: $this->makeLinkItems(),
            type: 'object'
        );

        $meta = new OA\Property(
            property: 'meta',
            properties: $this->makePaginationMeta(),
            type: 'object',
        );

        $content = new OA\JsonContent(
            properties: [
                $data,
                $links,
                $meta,
            ],
        );

        parent::__construct(
            response: 200,
            description: 'Success',
            content: $content
        );
    }

    private function makeLinkItems(): array
    {
        return [
            new PropertyString(
                property: 'first',
                nullable: true,
                example: 'https://site/api/route?page=1',
            ),
            new PropertyString(
                property: 'last',
                nullable: true,
                example: 'https://site/api/route?page=10',
            ),
            new PropertyString(
                property: 'prev',
                nullable: true,
                example: 'https://site/api/route?page=3',
            ),
            new PropertyString(
                property: 'next',
                nullable: true,
                example: 'https://site/api/route?page=5',
            ),
        ];
    }

    private function makePaginationMeta(): array
    {
        return [
            new PropertyInt(
                property: 'current_page',
                example: 1
            ),
            new PropertyInt(
                property: 'from',
                nullable: true,
                example: 1
            ),
            new PropertyInt(
                property: 'last_page',
            ),
            new OA\Property(
                property: 'links',
                type: 'array',
                items: new OA\Items(
                    properties: [
                        new PropertyString(
                            property: 'url',
                            nullable: true,
                            example: 'https://site/api/route',
                        ),
                        new PropertyString(
                            property: 'label',
                            example: 'pagination.previous'
                        ),
                        new PropertyBool('active'),
                    ]
                )
            ),
            new PropertyString(
                property: 'path',
                example: 'https://site/api/route'
            ),
            new PropertyInt(
                property: 'per_page',
                example: 10
            ),
            new PropertyInt(
                property: 'to',
                nullable: true,
                example: 10
            ),
            new PropertyInt(
                property: 'total',
                nullable: true,
                example: 100
            ),
        ];
    }
}
