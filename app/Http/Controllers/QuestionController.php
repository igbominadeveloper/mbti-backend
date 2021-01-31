<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Question;
class QuestionController extends Controller
{
    public function all(){
        
        $questions = Question::all();

        if(count($questions) == 0){
            return response([
                'error' => 'No Questions found',
            ], 400);    
        }

        return response([
            'questions' => $questions,
            'message' => 'Got all questions successfully',
        ], 200);    
    }
}
