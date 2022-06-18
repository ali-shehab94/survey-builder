<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Database\Eloquent\Model;

class ChoiceController extends Controller
{
    public function getChoices($id = null)
    {
        if ($id) 
        {
            $choice = Choice::where('question_id', $id)->get();
            return response()->json([
                "status" => "Success",
                "choices" => $choice,
            ], 200);
        }
    }
}
