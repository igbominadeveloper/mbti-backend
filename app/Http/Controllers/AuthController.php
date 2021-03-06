<?php

namespace App\Http\Controllers;

use App\Interfaces\ResponseInterface;
use App\Http\Requests\AuthLoginRequest;

class AuthController extends Controller {
    /**
     * Handle user login.
     *
     * @param  \App\Http\Requests\AuthLoginRequest  $request
     * @param  \App\Interface\ResponseInterface  $responseService
     * @return \Illuminate\Http\Response
     */
    public function login(AuthLoginRequest $request, ResponseInterface $responseService){
        $request->validate([
            'email' => 'required|email'
        ]);

        $userResponse = $responseService->getUserResponse($request->email);


        if(!$userResponse){
            return response([
                'error' => 'Record not found!!!'
            ], 404);
        }
        
        $userMbti = $responseService->calculateMbti($userResponse);

        return response([
            'mbti' => $userMbti,
        ], 200); 

    }
}
