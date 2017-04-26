<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\TaskValidate;

class AdminUsersController extends Controller
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
        $users = User::all();
        $test = "ok";
        return view('users.index',[
            'users' => $users,
            'test' => $test
        ]);
    }
    public function add(){
//        dd("ok");
        $error = "";
        return view('users.register',[
            'error' => $error
        ]);
    }

}
