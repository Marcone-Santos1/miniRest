<?php

use MiniRestFramework\Router\Router;

Router::post('/test', [\MiniRest\Http\Controllers\TestController::class, 'test']);
