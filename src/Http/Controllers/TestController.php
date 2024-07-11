<?php

namespace MiniRest\Http\Controllers;

use Exception;
use MiniRest\Models\User;
use MiniRestFramework\Http\Request\Request;
use MiniRestFramework\Http\Response\Response;

class TestController
{
    public function __construct(

    ) {
    }

    public function test(Request $request, User $user): Response
    {
        try {

            $user->fill([
                'name' => $request->json('name'),
                'email' => $request->json('email'),
                'password' => $request->json('password')
            ]);

            $user->save();
    
            return Response::json(['User created' => $user], 200);
        } catch (Exception $e) {
            return Response::json(['Error' => 'Failed to create user', 'details' => $e->getMessage()], 500);
        }
    }
}