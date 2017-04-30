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
        $users = User::where(['delete_flag' => 0])
        ->get();
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

    public function edit($userId){
        $user = User::where('id', "=", $userId)
        ->first();
//        dd($user);
        return view('users.detail',[
            'user' => $user
        ]);
    }

    public function update($userId, Request $request){

    }

    public function delete($userId){
        $user = User::where('id', "=", $userId)
            ->first();
        // soft delete user
        if(!$user){
            retdirect()->route('user.list');
        }else{
            $user->delete_flag = 1;
            $user->save();
        }
        return view('users.detail',[
            'user' => $user
        ]);
    }

}
