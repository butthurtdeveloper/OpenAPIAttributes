<?php

namespace OpenAPI\Operation;

use OpenApi\Annotations\Put;
use OpenAPI\Operation\Common\ApiOperation;

#[\Attribute(\Attribute::TARGET_CLASS)]
class ApiPut extends Put
{
    use ApiOperation;
}
