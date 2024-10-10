<?php

namespace OpenAPI\Properties;

use App\Enums\Locale;
use OpenApi\Attributes as OA;

class PropertyTranslatable extends OA\Property
{
    public function __construct(
        string $property,
        bool $nullable = false,
    ) {
        $items = [];

        foreach (Locale::cases() as $locale) {
            $locale = $locale->value;
            $items[] = new OA\Property(
                property: $locale,
                example: "{$property} on {$locale} language"
            );
        }

        parent::__construct(
            property: $property,
            properties: $items,
            type: 'object',
            nullable: $nullable
        );
    }
}
