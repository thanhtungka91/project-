<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskValidate;

class TasksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void;
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
        return view('tasks.index');
    }

    public function create(Request $request){
        $task = new Task();
        $task->name = $request->task_name;
        $task->content = $request->task_content;
        $task->save();
        return view('home');
    }

    public function login()
    {
        return view('home');
    }
}
