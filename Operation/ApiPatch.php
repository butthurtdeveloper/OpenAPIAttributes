<?php

namespace OpenAPI\Operation;

use OpenApi\Annotations\Patch;
use OpenAPI\Operation\Common\ApiOperation;

#[\Attribute(\Attribute::TARGET_CLASS)]
class ApiPatch extends Patch
{
    use ApiOperation;
}
