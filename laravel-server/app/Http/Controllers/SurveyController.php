<?php

namespace App\Http\Controllers;
use App\Models\Survey;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class SurveyController extends Controller
{
    public function getSurvey($id = null)
    {
        if ($id)
        {
            $survey = Survey::where('id', $id)->with('questions.choices')->get();
            return response()->json([
                "status" => "Success",
                "survey" => $survey,
            ], 200);
        }else 
        {
            $survey = Survey::all();
            return response()->json([
                "status" => "Success",
                "surveys" => $survey,
            ], 200);
        }
    }

    public function deleteSurvey(Request $request)
    {
        $survey_id = $request->survey_id;
        {
            $survey = Survey::find($survey_id);
            if($survey)
            {
                $survey->delete();
                return response()->json([
                    "status" => "Success",
                    "message" => "Survey with id $survey_id deleted successfully",
                ], 200);
            }
            return response()->json([
                "status" => "Success",
                "message" => "Survey with id $survey_id NOT FOUND",
            ], 200);
        };
        
    }
}
