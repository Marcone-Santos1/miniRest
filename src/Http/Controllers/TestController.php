<?php

namespace MiniRest\Http\Controllers;

use MiniRest\Http\Response\Response;

class TestController
{
    public function test() {
        return Response::json(['Test']);
    }
}