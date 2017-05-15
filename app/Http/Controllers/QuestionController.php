<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('question.list');
    }

    public function create(Request $request){
        $question = new Question();
        $question->question = $request->question;
        $question->question_type = $request->question_type;
        if($question->question_type == 1){
            $question->answers = $request->answers_type1;
        } else if($question->question_type == 2){
//
            $question->answers = "";
            dd($request->answers_type2);
            for ($i = 0; $i < count($request->answers_type2); $i++){
                dd("comere plase");
//                $question->answers = $question->answers . ','. $request->$request->answers_type2[$i];
            }

        }else {
            $question->answers = $request->answers_type3;
        }

        $question->public = $request->public;
        $question->save();
        return redirect()->route('question.add');
    }

    public function add()
    {
        return view('question.add');
    }
    public function doneRegister()
    {
        return view('question.done');
    }
}
