<?php

namespace OpenAPI\Operation;

use OpenApi\Annotations\Post;
use OpenAPI\Operation\Common\ApiOperation;

#[\Attribute(\Attribute::TARGET_CLASS)]
class ApiPost extends Post
{
    use ApiOperation;
}
