<?php

namespace App\Http\Controllers;
use Auth;
use Validator;
use App\Models\Survey;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function createSurvey(Request $request)
    {

        // we start with the survey title and create it in the database
        $survey = new Survey();
        $survey->title = $request->title;
        $survey->save();
        // the key questions hold all the questions added with attributes "type", "content", and "choices"
        // iterating through all the questions and recording them one by one in the database
        $questions = $request->questions;
        foreach ($questions as $question) {

            $type = $question['type'];
            $content = $question['content'];
            // if the question has a choices attribute, it will be stored in a variable that we will iterate through later
            if (isset($question['choices'])){
                $choices = $question['choices'];
            }else {
                $choices = null;
            }
            $question = new Question();
            $question->survey_id = $survey->id;
            $question->type = $type;
            $question->content = $content;
            $question->save();
            
            // storing question id in a variable for the use of choices
            $question_id = $question->id;
            // iterating over choices and recording them one by one in the database
            if ($choices){
                foreach ($choices as $choice) {
                    $choice_content = $choice;
                    $choice = new Choice();
                    $choice->question_id = $question_id;
                    $choice->choice = $choice_content;
                    $choice->save();
                }
            }
        }
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Successfully created survey',
            'Survey_title' => $survey->title,
            'Surevey_id' => $survey->id
        ]);
    }
}