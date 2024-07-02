<?php

namespace OpenAPI\Properties;

class PropertySlug extends PropertyString
{
    public function __construct()
    {
        return parent::__construct(
            property: 'slug',
            description: 'unique identifier',
        );
    }
}
