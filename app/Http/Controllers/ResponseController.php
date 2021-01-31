<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Response as ResponseModel;
use App\Http\Requests\ResponseRequest;
use App\Interfaces\ResponseInterface;

class ResponseController extends Controller
{
    public function __construct(ResponseInterface $responseService){
        $this->responseService = $responseService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ResponseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResponseRequest $request)
    {
        $userResponse = $request->validated();
        $email = $userResponse['email'];

        $mbti = $this->responseService->calculateMbti($userResponse);

        $this->responseService->recordResponse($userResponse);
        
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
    public function show(Request $request) {
        $email = $request->query('email');

        $userResponse = $this->responseService->getUserResponse($email);

        if(!$userResponse) {
            return response([
                'error' => 'Record Not Found!!!'
            ], 404);    
        }

        unset($userResponse['id']);
        unset($userResponse['created_at']);
        unset($userResponse['updated_at']);


          return response([
            'response' => $userResponse,
        ], 201);
    }
   
}
