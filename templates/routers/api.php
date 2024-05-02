<?php

use MiniRest\Router\Router;

Router::post('/test', ['someController::class', 'some action']);
