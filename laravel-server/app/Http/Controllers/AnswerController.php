<?php

namespace App\Http\Controllers;
use Auth;
use Validator;
use App\Models\Survey;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Http\Request;


class AnswerController extends Controller
{
   public function answerSurvey(Request $request)
   {
        $answer = new Answer;
        $answer->user_id = 5;
        $answer->survey_id =$request->survey_id;
        $answer->question_id =$request->question_id;
        $answer->content = $request->content;
        $answer->save();
        return response()->json([
            "status"=>"Success",
            "answers"=>$answer
        ]);
   }

   public function getAnswers(Request $request){
    $survey_id = $request->survey_id;
    $answers= Answer::where("survey_id",$survey_id)->with('questions')->with('users')->get();
    return response()->json([
        "status"=>"Success",
        "answers"=>$answers
    ]);
}
}