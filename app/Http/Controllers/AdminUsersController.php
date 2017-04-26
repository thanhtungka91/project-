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
        $error = "";
        return view('users.register',[
            'error' => $error
        ]);
    }
    public function create(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request['password']);
        $user->admin = $user->active = 0;
        // not done
        //validate same password
        // exist users before
        $user->save();
        return redirect()->route('user.list');
    }

}
