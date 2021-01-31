<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Response as ResponseModel;
use App\Http\Requests\ResponseRequest;

class ResponseController extends Controller
{
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

        $mbti = $this->calculateResult($userResponse);
        
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

    private function calculateResult($userResponse){
        $eiScore = 0;
        $snScore = 0;
        $tfScore = 0;
        $jpScore = 0;
        $mbti = '';

        $ei1 = $userResponse['ei-1'];
        $ei2 = $userResponse['ei-2'];
        $ei3 = $userResponse['ei-3'];
        $sn1 = $userResponse['sn-1'];
        $sn2 = $userResponse['sn-2'];
        $tf1 = $userResponse['tf-1'];
        $tf2 = $userResponse['tf-2'];
        $jp1 = $userResponse['jp-1'];
        $jp2 = $userResponse['jp-2'];
        $jp3 = $userResponse['jp-3'];

        // EI-1
        if($ei1 > 4){
            $eiScore+=1;
        }
        
        if($ei1 < 4){
            $eiScore-=1; 
        }
        
        // EI-2
        if($ei2 > 4){
            $eiScore-=1;
        }
        
        if($ei2 < 4){
            $eiScore+=1; 
        }
        
        // EI-3
        if($ei3 > 4){
            $eiScore-=1;
        }
        
        if($ei3 < 4){
            $eiScore+=1; 
        }
        
        
        // SN
        
        // SN-1
         if($sn1 > 4){
            $snScore-=1;
        }

        if($sn1 < 4){
            $snScore+=1; 
        }

        // SN-2
         if($sn2 > 4){
            $snScore+=1;
        }

        if($sn2 < 4){
            $snScore-=1; 
        }
       
       // TF
        // TF-1
         if($tf1 > 4){
            $tfScore+=1;
        }

        if($tf1 < 4){
            $tfScore-=1; 
        }
        // TF-2
         if($tf2 > 4){
            $tfScore-=1;
        }

        if($tf2 < 4){
            $tfScore+=1; 
        }
      
        // JP
        // JP-1
         if($jp1 > 4){
            $jpScore+=1;
        }

        if($jp1 < 4){
            $jpScore-=1; 
        }

        // jp-2
         if($jp2 > 4){
            $jpScore-=1;
        }

        if($jp2 < 4){
            $jpScore+=1; 
        }

        // jp-3
         if($jp3 > 4){
            $jpScore+=1;
        }

        if($jp3 < 4){
            $jpScore-=1; 
        }

        if($eiScore > 0) {
            $mbti = $mbti.'I';
        } else {
            $mbti = $mbti.'E';
        }      
      
        if($snScore > 0) {
            $mbti = $mbti.'N';
        } else {
            $mbti = $mbti.'S';
        }

        if($tfScore > 0) {
            $mbti = $mbti.'F';
        } else {
            $mbti = $mbti.'T';
        }

        if($jpScore > 0) {
            $mbti = $mbti.'P';
        } else {
            $mbti = $mbti.'J';
        }   

        return $mbti;
    }
}
