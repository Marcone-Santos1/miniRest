<?php

use MiniRest\Router\Router;

Router::get('/test', [\MiniRest\Http\Controllers\TestController::class, 'test']);
