<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Response as ResponseModel;
use App\Http\Requests\ResponseRequest;
use App\Interfaces\ResponseInterface;

class ResponseController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ResponseRequest  $request
     * @param  \App\Interface\ResponseInterface  $responseService
     * @return \Illuminate\Http\Response
     */
    public function store(ResponseRequest $request, ResponseInterface $responseService)
    {
        $userResponse = $request->validated();
        $email = $userResponse['email'];

        $mbti = $responseService->calculateMbti($userResponse);
        
        ResponseModel::upsert(
            [$userResponse],
            ['email'],
            ['ei-1', 'ei-2', 'ei-3', 'sn-1', 'sn-2', 'tf-1', 'tf-2', 'jp-1', 'jp-2', 'jp-3']
        );

        return response([
            'mbti' => $mbti,
        ], 201);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Response $response
     * @return \Illuminate\Http\Response
     */
    public function show(ResponseModel $response)
    {
        
    }
   
}
