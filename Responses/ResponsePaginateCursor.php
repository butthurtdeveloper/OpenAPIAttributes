<?php

namespace OpenAPI\Responses;

use OpenApi\Attributes as OA;
use OpenAPI\Properties\PropertyInt;
use OpenAPI\Properties\PropertyString;

#[\Attribute(\Attribute::TARGET_CLASS)]
class ResponsePaginateCursor extends OA\Response
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
                example: 'https://site/api/route?cursor=aaaa',
            ),
            new PropertyString(
                property: 'last',
                nullable: true,
                example: 'https://site/api/route?cursor=bbbb',
            ),
            new PropertyString(
                property: 'prev',
                nullable: true,
                example: 'https://site/api/route?cursor=cccc',
            ),
            new PropertyString(
                property: 'next',
                nullable: true,
                example: 'https://site/api/route?cursor=ffff',
            ),
        ];
    }

    private function makePaginationMeta(): array
    {
        return [
            new PropertyString(
                property: 'path',
                nullable: true,
                example: 'https://site/api/route',
            ),
            new PropertyInt(
                property: 'per_page',
                example: 10
            ),
            new PropertyString(
                property: 'next_cursor',
                nullable: true,
                example: '123123qweasd123',
            ),
            new PropertyString(
                property: 'prev_cursor',
                nullable: true,
                example: '123123qweasd123'
            ),
        ];
    }
}
