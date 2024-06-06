<?php

namespace MiniRest\Http\Controllers;

use MiniRestFramework\Http\Response\Response;

class TestController
{
    public function test(): Response
    {
        return Response::json(['Test']);
    }
}