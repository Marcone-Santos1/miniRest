<?php

namespace MiniRest\Http\Controllers;

use MiniRestFramework\Http\Response\Response;

class TestController
{
    public function test() {
        return Response::json(['Test']);
    }
}