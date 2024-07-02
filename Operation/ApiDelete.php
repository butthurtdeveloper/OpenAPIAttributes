<?php

namespace OpenAPI\Operation;

use OpenApi\Annotations\Delete;
use OpenAPI\Operation\Common\ApiOperation;

#[\Attribute(\Attribute::TARGET_CLASS)]
class ApiDelete extends Delete
{
    use ApiOperation;
}
