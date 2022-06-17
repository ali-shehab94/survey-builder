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

        // dd($request->questions);
        $survey = new Survey();
        $survey->title = $request->title;
        $survey->save();
        $questions = $request->questions;
        foreach ($questions as $question) {

            $type = $question['type'];
            $content = $question['content'];
            $question = new Question();
            $question->survey_id = $survey->id;
            $question->type = $type;
            $question->content = $content;
            $question->save();
            // dd($question->id);
            
            $choices = $question['choices'];
            $question_id = $question->id;
            foreach ($choices as $choice) {
                // dd($choice);
                $choice_content = $choice;
                $choice = new Choice();
                $choice->question_id = $question_id;
                // dd($choice);
                $choice->choice = $choice_content;
                $choice->save();
            }
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully created survey',
            'survey_title' => $survey->title,
            'surevey_id' => $survey->id
        ]);
    }
}