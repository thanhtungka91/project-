<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('question.list');
    }

    public function create(Request $request){
        $question = new Question();
        dd($request->all());
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
